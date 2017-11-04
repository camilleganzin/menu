<?php 
require_once('init.php');
require_once('header.php');

?>
<body>
	<main class="container-full">
		<nav class="navbar fixed-top navbar-dark bg-dark">
	      <a class="navbar-brand" href="index.php">Recettes au hasard</a>
	      <a href="admin.php">Espace Administration</a>
	    </nav>
		<div class="row no-gutters">
			<div class="col salt col-md-6 col-sm-12 col-xs-12">
				<form id="salt-search" class="col-md-12 col-sm-12 col-xs-12"> 
					<input class="col-md-12 col-sm-12 col-xs-12" id="button" type="submit" name="repas" value="J'ai envie de salé"/>
				</form>
			</div>
			<div class="col sugar col-md-6 col-sm-12 col-xs-12">
				<form id="sugar-search" class="col-md-12 col-sm-12 col-xs-12"> 
					<input class="col-md-12 col-sm-12 col-xs-12" id="button" type="submit" name="repas" value="J'ai envie de sucré"/>
				</form>
			</div>
			<div id="resultat" class="col" data-hidden="true"></div>
		</div>
	</main>
<?php
