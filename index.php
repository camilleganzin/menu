<?php 
require_once('init.php');
require_once('header.php');

?>
<main>
	<form id="recherche"> 
		<input id="button" type="submit" name="repas" value="J'ai faim !!!"/>
		<div id="resultat"></div>
	</form>
	
	<div id="admin">	
			<div id="little_button"><a href="admin.php">Espace Administration</a></div>
		<div id="resultat2"></div>
	</div>
</main>
<?php

require_once('footer.php');