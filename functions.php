<?php

function connexion_db() {
    global $config;
    try {
        $db = new PDO($config['dsn'],
                      $config['user'],
                      $config['password']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die('Erreur de base de données.');
    }
    return $db;
}


function salt() {
        //on demande de lister les fichiers contenus dans la table repas
        global $db, $config;

        $dossier = $db->query('SELECT id, nom, type, image, temps_preparation, lien, credit_photo 
            FROM repas 
            WHERE type = "Plat"
            ORDER BY RAND() ASC LIMIT 1'); //on demande à ce que l'un des repas ressorte de manière aléatoire

        $vrai_dossier = $dossier->fetchAll();

        return $vrai_dossier;
      
}

function sugar() {
        //on demande de lister les fichiers contenus dans la table repas
        global $db, $config;

        $dossier = $db->query('SELECT id, nom, type, image, temps_preparation, lien, credit_photo 
            FROM repas 
            WHERE type = "Dessert"
            ORDER BY RAND() ASC LIMIT 1'); //on demande à ce que l'un des repas ressorte de manière aléatoire

        $vrai_dossier = $dossier->fetchAll();

        return $vrai_dossier;
      
}


function liste_repas() {
        //on demande de lister les fichiers contenus dans la table repas
        global $db, $config;

        $dossier = $db->query('SELECT id, nom, type, image, temps_preparation, lien, credit_photo 
            FROM repas 
            ORDER BY id ASC');

        $vrai_dossier = $dossier->fetchAll();

        return $vrai_dossier;
      
}

function get_plat($id) {
    global $db;

    $plat = $db->query('SELECT id, nom, type, image, temps_preparation, lien, credit_photo FROM repas WHERE id='.$db->quote($id).' LIMIT 1')->fetch();

    return $plat;

}


function supprimer($id) {
    global $db;

    $requete =$db->exec("DELETE FROM repas WHERE id = ".$db->quote($id));

    return (bool)$requete;
}

function is_admin() {
    return isset($_SESSION['admin']) && $_SESSION['admin'];
}

function verif_password($essai) {
    global $config;
    $hash = hash('sha512', $salt, $config['admin_password']);
    return $hash;
}

function ajout_image($nom, $type, $temps_preparation, $lien, $image, $credit_photo) {
    global $db;
    $requete = $db->prepare('INSERT INTO repas (nom, type, temps_preparation, lien, image, credit_photo) VALUES (:nom, :type, :temps_preparation, :lien, :image, :credit_photo)');
    $reponse = $requete->execute(array(':nom' => htmlspecialchars($nom),
                                       ':type' => htmlspecialchars($type),
                                       ':temps_preparation' => htmlspecialchars($temps_preparation),
                                       ':lien' => htmlspecialchars($lien),
                                       ':image' => htmlspecialchars($image),
                                       ':credit_photo' =>htmlspecialchars($credit_photo)));
    if($reponse) {
        return $db->lastInsertId();
    } else {
        return $reponse;
    }
}

function modifications($id, $data) {
    global $db;
    $keys = array('nom', 'type', 'temps_preparation', 'lien', 'credit_photo', 'image');
    $updated_values = '';
    $req_data = array();
    foreach($data as $k => $v) {
        if(in_array($k, $keys)) {
            $updated_values .= $k.' = :'.$k.', ';
            $req_data[':'.$k] = $v;
        }
    }
    if(strlen($updated_values) > 0) {
        $updated_values = substr($updated_values, 0, -2);
    }
    $req_data[':id'] = $id;
    $requete = $db->prepare('UPDATE repas SET '.$updated_values.' WHERE id = :id LIMIT 1');
    $resultat = $requete->execute($req_data);
    return $resultat;
}