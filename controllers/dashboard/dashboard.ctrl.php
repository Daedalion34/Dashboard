<?php
require 'db_connection.php';

$tpl->activeMenu = 'dashboard';

$tpl->tplFile = 'dashboard/dashboard.tpl';

$tpl->pageTitle = $i18n->ucfirst('dashboard');


/*----------------------------------------------ONGLET DASHBOARD (moyenne par langue)----------------------------------------------*/

/*Commentaire: On instancie le modèle. Avec la fonction getAll, on prend toutes les données de la table.
Puis, avec le foreach, on calcule le taux de complétion total par langue.
Calcule 6 moyennes: DE, ES, FR, GB, IT, NL
Ensuite on affecte une couleur à la barre de progression et on appel tout cela dans le tpl */

$MLangue = new \modeles\dashboard\Langue;
$allLangue = $MLangue->getAll();
//appel la fonction getALL de Abstrac

foreach($allLangue as $key => $value){

    $color='';
    $taux = round((($value['totaux_champs_plein'] / ($value['totaux_champs_plein'] + $value['totaux_champs_vide'])) * 100), 0);
    /*C'est ici pour changer la couleur de la barre de progression des 6 boutons*/
    if ($taux <= 50) {
        $color = 'red-thunderbird';
    } elseif (($taux > 50) && ($taux < 70)) {
        $color = 'yellow-crusta';
    } else {
        $color = 'green-sharp';
    };

    $allLangue[$key]['taux'] = $taux;
    $allLangue[$key]['couleur'] = $color;
};


$tpl->allLangue = $allLangue;
/*------------------------------------------------------------------------------------------------------------*/

/*----------------------------------------------ONGLET DASHBOARD (datatable)----------------------------------------------*/
$nomLangue = strtoupper(get(0, LANG));
//recupére la langue de l'url

$tpl->hideDatatableFilter = true;
$tpl->hideDatatableAction = true;
//modification de certains paramètres de la datable, pour voir les diff, changer true en false

$tpl->dt_multiple = true;
/*une modification apporté par Maxime qui permet d'avoir deux datatables sur la même page

NE PAS OUBLIER LES MODIFICATIONS A APPORTER DANS LE TPL

    $this->ajaxUrl      = $this->tableAjaxUrl->etabs;
    $this->tableColumns = $this->tableEtabs;
    include($this->template('list/datatable.tpl'));

pour que datatable sache quel tableau on lui passe*/


/*-----concerne tous les onglets qui ont une datatable-----*/
$tpl->tableAjaxUrl = (object) [
    'etabs'       => '/dashboard/ajax/etabs/'.$nomLangue,
    'media'       => '/dashboard/ajax/media/'.$nomLangue,
    'destination' => '/dashboard/ajax/destination/'.$nomLangue
];
/*--------------------------------------------------------*/


$tpl->tableEtabs = array(
    array(
        'title' => '#',
        'filter' => array('type' => 'text', 'name' => '####')
    ),
    array(
        'title' => '####',
        'filter' => array('type' => 'text', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'text', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'select', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'select', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'select', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst($nomLangue), // recupère la langue sur laquel on se trouve
        'style' => 'width: 15%', // influence la taille d'une colonne.

    ),
    array(
        'title' => $i18n->ucfirst('completer'),

    )
);
/*------------------------------------------------------------------------------------------------------------*/


/*----------------------------------------------ONGLET MEDIAS (datatable)----------------------------------------------*/

$Mbadbad = new \modeles\dashboard\TopBad;
$allBadBad = $Mbadbad->getBadTwo();
$tpl->allBadBad = $allBadBad;
/*On instancie le modèle, la fonction getBadTwo
selectionne les 6 plus mauvais campings*/


/*--------MEDIAS good/bad---------------------*/

/*le code si-dessous affiche deux petits tableaux:
un pour les good media
et l'autre pour les mauvais medias
les fonctions sont aussi desactivés*/

/*$Mtop = new \modeles\dashboard\TopBad;
$Mbad = new \modeles\dashboard\TopBad;*/
/*$allTop = $Mtop->getTopCamping();
$allBad = $Mbad->getBadCamping();*/

//appel la fonction getALL de Abstrac
/*echo '<pre>';
var_dump($allTop);
echo '</pre>';*/

/*$tpl->allTop = $allTop;
$tpl->allBad = $allBad;*/
/*-----------------------------*/




$tpl->tableMedia = array(
    array(
        'title' => '####',
        'filter' => array('type' => 'text', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'text', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'select', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'select', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'select', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####'),
        'filter' => array('type' => 'select', 'name' => '####')
    ),
    array(
        'title' => $i18n->ucfirst('####').' 360',
        'filter' => array('type' => 'text', 'name' => '####')
    ),
    array(
         'title' => $i18n->ucfirst('####'),
         'filter' => array('type' => 'text', 'name' => '####')
    )
);
/*------------------------------------------------------------------------------------------------------------*/


/*----------------------------------------------ONGLET HEBERGEMENT----------------------------------------------------------*/

$MHebergementCategorieLangue   = new \modeles\dashboard\HebergementCategorieLangue;
$allHebergementCategorieLangue = $MHebergementCategorieLangue->getAll();

$MHebergementCategorie   = new \modeles\dashboard\HebergementCategorie;
$allHebergementCategorie = $MHebergementCategorie->getAll();

$tauxHebCategorie = array();
foreach($allHebergementCategorieLangue as $key => $value){

    $id_hebergement_categorie   = $value['####'];
    $id_langue                  = $value['####'];

    if (($value['total_plein'] + $value['total_vide']) === 0) {
        $taux_heb_categorie = 0;
    } else {
    $taux_heb_categorie = round((
        (
            $value['total_plein'] / ($value['total_plein'] + $value['total_vide'])
        ) * 100
    ), 0);
    }

    foreach ($allHebergementCategorie as $key_nom => $val_nom){
        $label_nom = '';
        if($val_nom['####'] != $id_hebergement_categorie) {
            continue;
        }
        $label_nom = $val_nom['####'];

        $liste_langue = '';
        foreach ($allLangue as $key_lang => $val_lang) {
            if($val_lang['####'] != $id_langue) {
                continue;
            }
            $liste_langue = $val_lang['####'];
        }
        $tauxHebCategorie[$label_nom][$liste_langue] = $taux_heb_categorie;
    }
};
$tpl->tauxHebCategorie = $tauxHebCategorie;
/*------------------------------------------------------------------------------------------------------------*/

/*----------------------------------------------ONGLET DESTINATION----------------------------------------------------------*/


$MDestinationLangue   = new \modeles\dashboard\DestinationLangue;
$allDestinationLangue = $MDestinationLangue->getAll();

$MDestination   = new \modeles\dashboard\Destination;
$allDestination = $MDestination->getAll();


$tauxParDestType = array();
foreach($allDestinationLangue as $key => $value){

    $id_dest_type   = $value['####'];
    $id_langue      = $value['####'];
    $taux_dest_type = round((
        (
            $value['champs_plein'] / ($value['champs_plein'] + $value['champs_vide'])
        ) * 100
    ), 0);

    foreach ($allDestination as $key_nom => $val_nom){
        $label_nom = '';
        if($val_nom['####'] != $id_dest_type) {
            continue;
        }
        $label_nom = $val_nom['####'];

        $liste_langue = '';
        foreach ($allLangue as $key_lang => $val_lang) {
            if($val_lang['####'] != $id_langue) {
                continue;
            }
            $liste_langue = $val_lang['####'];
        }
        $tauxParDestType[$label_nom][$liste_langue] = $taux_dest_type;
    }
};
$tpl->tauxParDestType = $tauxParDestType;
/*------------------------------------------------------------------------------------------------------------*/
