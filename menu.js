$(function() {
	$('#salt-search').submit(function(ev){
		ev.preventDefault();
		$('#resultat').text('');
		$.get('menuSalt.php', {}, function(data) {
			for(var i in data["repas"]) {
				var repas = data["repas"][i];

				$('#resultat').append('<div class="repas" id="'+repas['id']+'"><h2><a href="'+repas['lien']+'">'+repas['nom']+'</a></h2><p>'+repas['type']+'</p><p>'+repas['temps_preparation']+'</p></div>');
				$('#resultat').css('background','url(../images/'+repas['image']+') no-repeat center center');
				$('.salt').toggle();
				$('.sugar').toggle();
			}
		});

	});

	$('#sugar-search').submit(function(ev){
		ev.preventDefault();
		$('#resultat').text('');
		$.get('menuSugar.php', {}, function(data) {
			for(var i in data["repas"]) {
				var repas = data["repas"][i];

				$('#resultat').append('<div class="repas" id="'+repas['id']+'"><h2><a href="'+repas['lien']+'">'+repas['nom']+'</a></h2><p>'+repas['type']+'</p><p>'+repas['temps_preparation']+'</p></div>');
				$('#resultat').css('background','url(../images/'+repas['image']+') no-repeat center center');
				$('.salt').toggle();
				$('.sugar').toggle();
			}
		});

	});

});