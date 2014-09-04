<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>J'ai faim - admin</title>
        <script type="text/javascript" src="jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="admin.js"></script>
        <link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="style.css"/>
        <link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    </head>
    <body data-ajax="<?= $config['ajax_url'] ?>">
        <form data-action="login" data-hidden="true">
            <input class="connexion" type="password" name="password" />
            <input class="validation_connexion btn btn-warning" type="submit" value="Connexion" />
            <div class="label label-warning connect"><a href="index.php">Retour à la page d'accueil.</br>Laissez faire le hasard !</a></div>
        </form>
        <div data-id="admin" data-hidden="true">
            <header>
                <h1>Bienvenue sur l'espace d'administration !</h1>
                <button data-id="logout" class="btn btn-warning">Déconnexion</button>
                <div class="label label-warning"><a href="index.php">Retour à la page d'accueil.</br>Laissez faire le hasard !</a></div>
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
                    <input class="form-control" name="type" id="id_type"/>
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
                    <input class="form-control" name="type" id="id_type"/>
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
    </body>
</html>