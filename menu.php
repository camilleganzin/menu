<?php

require_once('init.php');


$resultat = array();
header('Content-Type: application/json');

$resultat['repas'] = array();
	

$resultat_pagines = menu($_REQUEST['type']);
$resultat['repas'] = $resultat_pagines;

echo json_encode($resultat);