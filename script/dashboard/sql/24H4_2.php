<?php
require_once(__DIR__.'/../config-parameter-dash.php');

$destPays              = [
    (object) [
        'column' => '####',
        'table'  => '####',
        'alias'  => '####'
    ]
];

foreach($destPays as $value)
{
    if($requete_champs_pleins !== '')
    {
        $requete_champs_pleins .= '+';
    }

    $requete_champs_pleins .= '(
      SELECT
          COUNT('.$value->alias.'.'.$value->column.')
        FROM
          `'.$dbname.'`.'.$value->table.' AS '.$value->alias.'
        WHERE
          '.$value->alias.'.#### = l.####
          AND '.$value->alias.'.'.$value->column.' != ""

    )';

    if($requete_champs_vides !== '')
    {
        $requete_champs_vides .= '+';
    }
    $requete_champs_vides .= '(
      SELECT
          COUNT('.$value->alias.'.'.$value->column.')
        FROM
          `'.$dbname.'`.'.$value->table.' AS '.$value->alias.'
          WHERE
            '.$value->alias.'.#### = l.####
            AND ('.$value->alias.'.'.$value->column.' = ""
            OR '.$value->alias.'.'.$value->column.' IS NULL
            )
    )';
}

$requete ='
    INSERT INTO `'.$dbname_storage.'`.####
      (####, ####, ####, ####)
    SELECT
      "2" as ####,
    l.####,
    (';
$requete .= $requete_champs_pleins;
$requete .= ') AS champs_plein, (';
$requete .= $requete_champs_vides;

$requete .= ') AS champs_vide
FROM
`'.$dbname_storage.'`.etabs AS e
NATURAL JOIN
`'.$dbname_storage.'`.langue AS l
ON DUPLICATE KEY UPDATE
`'.$dbname_storage.'`.####.champs_plein =(';
$requete .= $requete_champs_pleins;
$requete .= '), `'.$dbname_storage.'`.####.champs_vide =(';
$requete .= $requete_champs_vides;
$requete .= ')';


echo $requete.';';
echo 'SELECT ROW_COUNT();';
