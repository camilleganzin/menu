<?php 
require_once('init.php');
require_once('header.php');

?>
<body>
	<div class="container-fluid">
    <nav class="navbar fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Recettes au hasard</a>
      <a href="admin.php">Espace Administration</a>
    </nav>
	<main class="row row-full-width">
		<div class="content-section">
			<div class="container full-width">
	        	<div class="row row-full-width">
	        		<div class="col salt">
						<form id="salt-search" class="col-md-12 col-sm-12 col-xs-12"> 
							<input class="col-md-12 col-sm-12 col-xs-12" id="button" type="submit" name="repas" value="J'ai envie de salé"/>
						</form>
					</div>
					<div class="col sugar">
						<form id="sugar-search" class="col-md-12 col-sm-12 col-xs-12"> 
							<input class="col-md-12 col-sm-12 col-xs-12" id="button" type="submit" name="repas" value="J'ai envie de sucré"/>
						</form>
					</div>
					<div id="resultat" class="col-md-12 col-sm-12 col-xs-12"></div>
	        	</div>
			</div>
		</div>
	</main>
<?php

require_once('footer.php');