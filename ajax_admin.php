<?php
require_once('init.php');


$reponse['statut'] = false;
$reponse['erreurs'] = array();

if(is_admin()) {
    if(isset($_REQUEST['action'])) {
        switch($_REQUEST['action']) {
            case 'login':
                $reponse['erreurs'][] = 'Vous êtes déjà connecté(e).';
                break;
            case 'logout':
                $_SESSION = array();
                $reponse['statut'] = true;
                break;
            case 'is_logged':
                // gérer la connexion à l'espace d'admin
                $reponse['logged'] = true;
                $reponse['statut'] = true;
                break;
            case 'listing':
                // gérer l'affichage de la liste
                $reponse['listing'] = liste_repas();
                $reponse['statut'] = true;
                break;
            case 'suppression':
                // gérer la suppression
                if(isset($_REQUEST['id'])){
                    $reponse['statut'] = supprimer($_REQUEST['id']);
                    if(!$reponse['statut']) {
                        $reponse['erreurs'][] = 'Erreur lors de la suppression';
                    }
                } else {
                    $reponse['erreurs'][] = 'Paramètre id manquant.';
                }
                    break;
            case 'get_plat':
                if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
                    $reponse['plat'] = get_plat($_REQUEST['id']);
                    if(!$reponse['plat']) {
                        $reponse['erreurs'][] = 'Plat inconnu.';
                    } else {
                        $reponse['statut'] = true;
                    }
                } else {
                    $reponse['erreurs'][] = 'Paramètres incorrects.';
                }
                    break;
            case 'modifier':
                // gérer la modification
                if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
                    if(isset($_REQUEST['nom'],
                         $_REQUEST['type'],
                         $_REQUEST['temps_preparation'],
                         $_REQUEST['lien'],
                         $_REQUEST['credit_photo'])) {
                        $data = array();
                        if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                            $plat = get_plat($_REQUEST['id']);
                            if(!$plat) {
                                $reponse['erreurs'][] = 'Plat inconnu.';
                                break;
                            }
                            // gestion de l’upload et suppression de l’ancienne
                            // image
                            if(check_type($_FILES['image'])) {
                                $filename = get_filename($_FILES['image']['name']);
                                if(move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$filename)) {
                                    @unlink('images/'.$plat['image']);
                                    $data['image'] = $filename;
                                }
                            }
                        }
                        $keys = array('nom', 'type', 'temps_preparation', 'lien', 'credit_photo');
                        foreach($keys as $k) {
                            if(!empty($_REQUEST[$k])) {
                                $data[$k] = $_REQUEST[$k];
                            }
                        }
                        $reponse['statut'] = modifications($_REQUEST['id'], $data);
                        if(!$reponse['statut']) {
                            $reponse['erreurs'][] = 'Erreur lors de la modification.';
                        } else {
                            $reponse['id'] = $_REQUEST['id'];
                        }
                    }
                } else {
                    $reponse['erreurs'][] = 'Paramètres incorrects.';
                }
                break;

            case 'add':
                // gérer l’ajout
                if(isset($_REQUEST['nom'],
                         $_REQUEST['type'],
                         $_REQUEST['temps_preparation'],
                         $_REQUEST['lien'],
                         $_REQUEST['credit_photo'])
                   && !empty($_REQUEST['nom'])
                   && !empty($_REQUEST['type'])
                   && !empty($_REQUEST['temps_preparation'])
                   && !empty($_REQUEST['lien'])
                   && !empty($_REQUEST['credit_photo'])) {
                    $reponse['id'] = ajout_image($_REQUEST['nom'],
                                                 $_REQUEST['type'],
                                                 $_REQUEST['temps_preparation'],
                                                 $_REQUEST['lien'],
                                                 $_REQUEST['credit_photo'],
                                                 'vide.jpg');
                    if($reponse['id']) {
                        $reponse['statut'] = true;
                    } else {
                        $reponse['erreurs'][] = 'Erreur lors de l’insertion.';
                    }
                } else {
                    $reponse['erreurs'][] = 'Paramètres incorrects.';
                }
                break;
            default:
                $reponse['erreurs'][] = 'Action inconnue.';
                break;
        }
    } else {
        $reponse['erreurs'][] = 'Paramètre action manquant.';
    }
} else {
    if(isset($_REQUEST['action'])) {
        switch($_REQUEST['action']) {
            case 'login':
                if(isset($_REQUEST['password'])
                   && $hash = $_REQUEST['password']) {
                    $_SESSION['admin'] = true;
                    $reponse['statut'] = true;
                } else {
                    $reponse['erreurs'][] = 'Mot de passe incorrect.';
                }
                break;
            case 'is_logged':
                $reponse['logged'] = false;
                $reponse['statut'] = true;
                break;
            default:
                $reponse['erreurs'][] = 'Authentification requise.';
        }
    } else {
        $reponse['erreurs'][] = 'Authentification requise.';
    }

$resultat['repas'] = array();
$resultat_pagines = liste_repas();
$resultat['repas'] = $resultat_pagines;
}

header('Content-Type: application/json');

echo json_encode($reponse);