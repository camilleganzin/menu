<?php 
require_once('init.php');
require_once('header.php');
?>
    <body data-ajax="<?= $config['ajax_url'] ?>">
    	<div class="container-fluid">
    		<nav class="navbar fixed-top navbar-dark bg-dark">
		      <a class="navbar-brand" href="index.php">Recettes au hasard</a>
		    </nav>
	        <form data-action="login" data-hidden="true" class="row form-connexion">
	            <input class="connexion col-md-7 col-sm-12 col-xs-12" type="password" name="password" />
	            
	            <button type="submit" class="validation_connexion btn btn-primary col-md-5 col-sm-12 col-xs-12">Connexion</button>
	        </form>
	        <div data-id="admin" data-hidden="true">
	            <header>
	                <h1>Bienvenue sur l'espace d'administration !</h1>
	                <button data-id="logout" class="btn btn-warning">Déconnexion</button>
	                <div class="btn"><a href="index.php">Accueil</a></div>
	            </header>
	        </div>
	        <div data-id="admin" data-hidden="true">
	            <button data-id="show-add-form" class="btn btn-info">Afficher l’ajout</button>
	            <form data-action="add" data-hidden="true">
	                <div class="form-group">
	                    <label class="control-label" for="id_nom">Nom : </label>
	                    <input class="form-control" type="text" name="nom" id="id_nom" />
	                </div>
	                <div class="form-group">
	                    <label class="control-label" for="id_type">Type : </label>
	                    <select class="form-control" name="type" id="id_type">
	                    	<option value="Plat">Plat</option>
	                    	<option value="Dessert">Dessert</option>
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label class="control-label" for="id_temps_preparation">Temps de préparation : </label>
	                    <input class="form-control" type="text" name="temps_preparation" id="id_id_temps_preparation" />
	                </div>
	                <div class="form-group">
	                    <label class="control-label" for="id_lien">Lien : </label>
	                    <input class="form-control" type="text" name="lien" id="id_lien" />
	                </div>
	                <div class="form-group">
	                    <label class="control-label" for="id_credit_photo">Crédit photo : </label>
	                    <input class="form-control" type="text" name="credit_photo" id="id_credit_photo" />
	                </div>
	                <div class="form-group">
	                    <input type="submit" value="Ajouter" class="btn btn-primary" />
	                </div>
	            </form>
	
	            <form data-action="del" data-hidden="true">
	                <div class="form-group">
	                    <p>Voulez-vous réellement supprimer le plat <span data-id="nom-plat"></span> ?</p>
	                </div>
	                <div class="form-group">
	                    <input type="hidden" name="id" />
	                    <input type="submit" value="Oui" class="btn btn-danger" />
	                    <button type="button" data-id="cancel" class="btn btn-success">Non</button>
	                </div>
	            </form>
	
	            <form data-action="modifier" data-hidden="true">
	                <div class="form-group">
	                    <label class="control-label" for="id_nom">Nom : </label>
	                    <input class="form-control" type="text" name="nom" id="id_nom" />
	                </div>
	                <div class="form-group">
	                    <p class="control-label">Image actuelle : </p>
	                    <img data-id="plat-img" data-src="images/" class="img-thumbnail" />
	                </div>
	                <div class="form-group">
	                <label class="control-label" for="id_image">Image : </label>
	                <input type="file" name="image" id="id_image" />
	                </div>
	                <div class="form-group">
	                    <label class="control-label" for="id_type">Type : </label>
	                    <select class="form-control" name="type" id="id_type">
	                    	<option value="Plat">Plat</option>
	                    	<option value="Dessert">Dessert</option>
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label class="control-label" for="id_temps_preparation">Temps de préparation : </label>
	                    <input class="form-control" type="text" name="temps_preparation" id="id_id_temps_preparation" />
	                </div>
	                <div class="form-group">
	                    <label class="control-label" for="id_lien">Lien : </label>
	                    <input class="form-control" type="text" name="lien" id="id_lien" />
	                </div>
	                <div class="form-group">
	                    <label class="control-label" for="id_credit_photo">Crédit photo : </label>
	                    <input class="form-control" type="text" name="credit_photo" id="id_credit_photo" />
	                </div>
	                <div class="form-group">
	                     <input type="hidden" name="id" />
	                    <input type="submit" value="Modifier" class="btn btn-primary" />
	                </div>
	            </form>
	
	            <table class="table resultat2" data-id="liste-plats">
	                <tr data-id="header"><th>#</th><th>Nom</th><th>Image</th><th></th><th>Édition</th></tr>
	                <tr data-template="plat" data-hidden="true">
	                    <td data-id="plat-id"></td>
	                    <td data-id="plat-nom"></td>
	                    <td><img data-id="plat-img" data-src="images/" class="img-thumbnail" /></td>
	                    <td data-id="plat-score"></td>
	                    <td data-id="plat-edition">
	                        <button data-id="plat-mod" class="btn btn-info">Modifier</button>
	                        <button data-id="plat-del" class="btn btn-danger supprimer">Supprimer</button>
	                    </td>
	                </tr>
	            </table>
	        </div>
	    </div>
    </body>
</html>