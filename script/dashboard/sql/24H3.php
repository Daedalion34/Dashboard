<?php
/*
 * detail sur $requete_columns_name: on concat le nom de la table
 * avec le nom de la colone en fonction des conditions et ensuite
 * on concat tous les resultas.
 */

require_once(__DIR__.'/../config-parameter-dash.php');

echo 'TRUNCATE TABLE `'.$dbname_storage.'`.####;';

$table                 = [
    (object) [
        'column' => '####',
        'table'  => '####',
        'alias'  => '####'
    ]
];


foreach($table as $value)
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

          AND '.$value->alias.'.#### = e.####
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
            OR '.$value->alias.'.'.$value->column.' IS NULL)
          AND '.$value->alias.'.#### = e.####
    )';
    if($requete_columns_name !== '')
    {
        $requete_columns_name .= ',';

    }
    $requete_columns_name .= '
    (
        SELECT
            CONCAT_WS(
                \'.\',
                TABLE_NAME,
                COLUMN_NAME
            )
        FROM information_schema.`COLUMNS`
        WHERE TABLE_NAME = \''.$value->table.'\'
        AND TABLE_SCHEMA = \''.$dbname.'\'
        AND COLUMN_NAME = \''.$value->column.'\'
        AND (
                SELECT
                    COUNT('.$value->alias.'.'.$value->column.')
                FROM `'.$dbname.'`.'.$value->table.' AS '.$value->alias.'
                WHERE '.$value->alias.'.#### = l.####
                AND ('.$value->alias.'.'.$value->column.' = "" OR '.$value->alias.'.'.$value->column.' IS NULL)
                AND '.$value->alias.'.#### = e.####
            ) > 0
    )
	';
}

$requete ='
    INSERT INTO ####
      (####, ####, ####, ####, ####)
    SELECT
        e.####,
        l.####,
    (';
$requete .= $requete_champs_pleins;
$requete .= ') AS champs_plein, (';
$requete .= $requete_champs_vides;

$requete .= ') AS champs_vide,
( CONCAT_WS(\', \',';

$requete .= $requete_columns_name;
$requete .=')) AS nom_colonne
    FROM
        `'.$dbname_storage.'`.#### AS e
    NATURAL JOIN
        `'.$dbname_storage.'`.#### AS l;';


echo $requete;

echo 'SELECT ROW_COUNT();';
