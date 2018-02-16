<?php

require 'db_connection.php';

$MHebergementCategorie   = new \modeles\dashboard\HebergementCategorie;

$MLangue2 = new \modeles\dashboard\Langue;

$MHebergementCategorieLangue   = new \modeles\dashboard\HebergementCategorieLangue;


$idcategoriehebergement = get(0, null);
$langueHebergement      = get(1, null);


$hebergement   = $MHebergementCategorie->getIdHebergementForNom($idcategoriehebergement);
$switchLangueHeb = $MLangue2->getIdLangueForNom($langueHebergement);

$AllHebergement = $MHebergementCategorie->getModalHebergement($hebergement, $switchLangueHeb);

echo '<pre>';

if ($AllHebergement['page_ded'] == 1){
    echo 'La page est dédiée: '.$AllHebergement['page_ded'];
    } else {
    echo 'La page n\'est pas dédiée: '.$AllHebergement['page_ded'];
    }

echo '<BR>';
if ($AllHebergement['nom_colonne'] != '' || $AllHebergement['nom_colonne'] != NULL){
    echo 'Les champs vide sont: '.$AllHebergement['nom_colonne'];
} else {
    echo 'Pas de champs vide';
}

echo '</pre>';
