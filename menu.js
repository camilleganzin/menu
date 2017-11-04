$(function() {

	if($('#resultat').attr('data-hidden') == 'false') {
        $('#resultat').attr('data-hidden', 'true');
    }

	function get_recipes(type) {
		$('#resultat').text('');
		$.get('menu.php', {type : type}, function(data) {
			for(var i in data["repas"]) {
				var repas = data["repas"][i];

		        if($('#resultat').attr('data-hidden') == 'true') {
		            $('#resultat').attr('data-hidden', 'false');
		        }

				$('#resultat').append('<div class="repas" id="'+repas['id']+'"><h2><a href="'+repas['lien']+'">'+repas['nom']+'</a></h2><p>'+repas['type']+'</p><p>'+repas['temps_preparation']+'</p></div>');
				$('#resultat').css('background','url(../images/'+repas['image']+') no-repeat center center');
				$('.salt').toggle();
				$('.sugar').toggle();
			}
		});

	}


	$('#salt-search').submit(function(ev){
		ev.preventDefault();
		get_recipes('Plat');

	});

	$('#sugar-search').submit(function(ev){
		ev.preventDefault();
		get_recipes('Dessert');

	});

});