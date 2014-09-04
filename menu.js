$(function() {
	$('#recherche').submit(function(ev){
		ev.preventDefault();
		$('#resultat').text('');
		$.get('menu.php', {}, function(data) {
			for(var i in data["repas"]) {
				var repas = data["repas"][i];

				$('#resultat').append('<div class="repas" id="'+repas['id']+'"><h2><a href="'+repas['lien']+'">'+repas['nom']+'</a></h2><figure><img src="images/'+repas['image']+'" alt='+repas['nom']+'width="150"/><figcaption>'+repas['credit_photo']+'</figcaption></figure><p>'+repas['type']+'</p><p>'+repas['temps_preparation']+'</p></div>');

				$('#button').remove();
				$('#little_button').remove();
			}
		});

	});

});