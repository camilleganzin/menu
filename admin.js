$(function() {
    var ajax_url = $('body').data('ajax');

    //decorateur
    function reponse_ajax(callback) {
        function callback2(data) {
            if(!data['statut']) {
                alert(data['erreurs'].join('\n'));
                return;
            }
            return callback(data);
        }
        return callback2;
    }

    function clean_form(form) {
        form.attr('data-hidden', 'true');
        $('[name]', form).val('');
    }

    $('body').on('submit', 'form', function(ev) {
        ev.preventDefault();
        values = {action: $(ev.target).data('action')};
        $('[name]', ev.target).each(function(i) {
            values[$(this).attr('name')] = $(this).val();
        });
        $.post(ajax_url, values, reponse_ajax(function(data) {
            clean_form($(ev.target));
            submit_function = $(ev.target).data('submit');
            if(submit_function !== undefined) {
                submit_function(data);
            }
        }));
        
    });

    //gestion de la déconnexion
    $('[data-id="admin"]').on('click', '[data-id="logout"]', function(data) {
        $.post(ajax_url, {action: 'logout'}, reponse_ajax(function(data) {
            $('[data-id="admin"]').attr('data-hidden', 'true');
            $('[data-action="login"]').attr('data-hidden', 'false');
        }));
    });

    //on définie la fonction qui gère l'affichage de l'espace d'admin
    function charger_page() {
        $('[data-id="admin"]').attr('data-hidden', 'false');
        afficher_liste();
    }

    //on définie la fonction qui gère l'affichage de la liste de la bdd dans l'espace d'admin
    function afficher_liste() {
        $('[data-id="liste-plats"] tr').not('[data-template="plat"]').not('[data-id="header"]').remove();
        var future = $.post(ajax_url, {action: 'listing'}, reponse_ajax(function(data) {
            var template = $('[data-template="plat"]');
            if(data['listing']) {
                for(var i in data["listing"]) {
                    var repas = data["listing"][i];
                    console.log('on affiche '+repas['nom']);
                    var ligne = template.clone();
                    ligne.attr('data-template', null);
                    ligne.attr('data-plat-id', repas['id']);
                    $('[data-id="plat-id"]', ligne).text(repas['id']);
                    $('[data-id="plat-nom"]', ligne).text(repas['nom']);
                    $('[data-id="plat-img"]', ligne).attr('src', $('[data-id="plat-img"]', ligne).data('src')+repas['image']);
                    $('[data-id="plat-img"]', ligne).attr('alt', repas['image']);
                    ligne.attr('data-hidden', 'false');
                    $('[data-id="liste-plats"]').append(ligne);
                }
            }
        }));
        return future;
    }

    //gestion connexion admin
    $.post(ajax_url, {action: 'is_logged'}, function(data) {
        if(data['logged']) {
            charger_page();
        } else {
            $('[data-action="login"]').attr('data-hidden', 'false');
        }
    });

    //suppression ligne du tableau
    $('.resultat2').on('click', '.supprimer', function(ev){
        ev.preventDefault();
        var id = $(ev.target).parents('tr').data('plat-id');
        $.post(ajax_url, {action: 'suppression', id: id}, reponse_ajax(function(data) {
                afficher_liste();
            }));
    });

    //formulaire modification
    $('[data-id="liste-plats"]').on('click', '[data-id="plat-mod"]', function(ev) {
        var form = $('[data-action="modifier"]');
        var id = $(ev.target).parents('tr').data('plat-id');
        $.post(ajax_url, {action: 'get_plat', id: id}, reponse_ajax(function(data) {
            for(var i in data['plat']) {
                if(i != 'image') {
                    $('[name="'+i+'"]', form).val(data['plat'][i]);
                }
            }
            $('[data-id="plat-img"]', form).attr('src', $('[data-id="plat-img"]').data('src')+data['plat']['image']);
            $('[name="id"]', form).val();
            form.attr('data-hidden', 'false');
        }));
    });

    //gestion du formulaire d'ajout
    $('[data-id="show-add-form"]').click(function(ev) {
        var form = $('[data-action="add"]');
        if(form.attr('data-hidden') == 'true') {
            form.attr('data-hidden', 'false');
            $(ev.target).text('Cacher l’ajout');
        } else {
            form.attr('data-hidden', 'true');
            $(ev.target).text('Afficher l’ajout');
        }
    });

    $('[data-action="login"]').data('submit', function(data){
        //$('[data-action="login"]').attr('data-hidden', 'true');
        charger_page();
    });

});