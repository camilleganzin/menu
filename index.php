<?php 
require_once('init.php');
require_once('header.php');

?>
<main class="row">
	<div class="content-section">
		<div class="container">
        	<div class="row">
        		<div class="col">
					<form id="salt-search" class="col-md-12 col-sm-12 col-xs-12"> 
						<input class="col-md-12 col-sm-12 col-xs-12" id="button" type="submit" name="repas" value="J'ai envie de salé"/>
					</form>
				</div>
				<div class="col">
					<form id="sugar-search" class="col-md-12 col-sm-12 col-xs-12"> 
						<input class="col-md-12 col-sm-12 col-xs-12" id="button" type="submit" name="repas" value="J'ai envie de sucré"/>
					</form>
				</div>
				<div id="resultat" class="col-md-12 col-sm-12 col-xs-12"></div>
        	</div>
		</div>
</main>
<?php

require_once('footer.php');