<?php
/*
 * explication requête: similaire à la requête 24H3.php. On compte
 * les champs pleins et les champs vides. On concact les nom des colonne vide.
 * Pour la fin de la requête: je prend l'infos de la page dediée.
 * Nous avons les comptages de champs_P2 et champs_V2 puis de champs_P3 et de champs_V3.
 * Nous avons 3 tables, si dans la premiere page dediée est egal à 1, nous allons compter dans la deuxieme.
 * A partir de la deuxieme table, nous allons compter dans la 3ieme table.
 * J'additionne champs_plein, champs_p2, champs_p3 pour avoir total_plein.
 * J'additionne champs_vide, champs_v2, champs_v3 pour avoir total_vide.
 * La concaténation des noms de colonne vide se fait au niveau de la 1er table, c'est pour cela que l'on peut
 * avoir un ratio inferieur à 100 % qui indique pas de champs vide, car ces champs vide là sont soit dans la
 * 2ieme ou 3ieme table.
 *
 * Bonne chance!
 */

require_once(__DIR__.'/../config-parameter-dash.php');

echo 'TRUNCATE TABLE `'.$dbname_storage.'`.####;';

$tableHeber                   = [
    (object) [
        'column' => '####',
        'table'  => '####',
        'alias'  => '####'
    ]
];

foreach($tableHeber as $value)
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

          AND '.$value->alias.'.#### = hc.####
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
          AND '.$value->alias.'.'.$value->column.' = ""

          AND '.$value->alias.'.#### = hc.####
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
                AND '.$value->alias.'.#### = hc.####
            ) > 0
    )';
}

$requete ='INSERT INTO ####
  (####, ####, ####, ####, ####,
  ####, ####, ####, ####, ####)

    SELECT
          hc.####,
          l.####,
      (';
$requete .= $requete_champs_pleins;
$requete .= ') AS champs_plein, (';
$requete .= $requete_champs_vides;

$requete .= ') AS champs_vide,
( CONCAT_WS(\', \',';

$requete .= $requete_columns_name;
$requete .=')) AS nom_colonne,

( SELECT
    eci.####
  FROM
    `'.$dbname.'`.#### AS eci
  WHERE
    eci.#### = l.####

    AND eci.#### = hc.####
) AS page_ded,

( SELECT
    COUNT(hclt.####)
  FROM
    `'.$dbname.'`.#### AS hclt
  LEFT JOIN
    `'.$dbname.'`.#### AS eci
  ON
    eci.#### = hclt.####
  WHERE
    eci.#### = hc.####
  AND
    eci.#### = l.####
  AND
    hclt.#### != ""

) AS champs_P2,

( SELECT
    COUNT(hclt.####)
  FROM
    `'.$dbname.'`.#### AS hclt
  LEFT JOIN
    `'.$dbname.'`.#### AS eci
  ON
    eci.#### = hclt.####
  WHERE
    eci.#### = hc.####
    AND
      eci.#### = l.####
    AND
      (hclt.#### = "" OR hclt.#### IS NULL)

) AS champs_V2,
( SELECT
    COUNT(hcltypos.####)
  FROM
    `'.$dbname.'`.#### AS hcltypos
  LEFT JOIN
    `'.$dbname.'`.#### AS hclt
  ON
    hclt.#### = hcltypos.####
  LEFT JOIN
    `'.$dbname.'`.#### AS eci
  ON
    eci.#### = hclt.####
  WHERE
    eci.#### = hc.####
  AND
    eci.#### = l.####
  AND
    hcltypos.#### !=""
) AS champs_P3,

( SELECT
    COUNT(hcltypos.####)
  FROM
    `'.$dbname.'`.#### AS hcltypos
  LEFT JOIN
    `'.$dbname.'`.#### AS hclt
  ON
    hclt.#### = hcltypos.####
  LEFT JOIN
    `'.$dbname.'`.#### AS eci
  ON
    eci.#### = hclt.####
  WHERE
    eci.#### = hc.####
  AND
    eci.#### = l.####
  AND
    (hcltypos.#### ="" OR hcltypos.#### IS NULL)
) AS champs_V3
    FROM
        `'.$dbname_storage.'`.#### AS hc
    NATURAL JOIN
        `'.$dbname_storage.'`.#### AS l;

        UPDATE #### SET total_plein = champs_plein+champs_p2+champs_p3 WHERE page_ded=1;
        UPDATE #### SET total_vide = champs_vide+champs_v2+champs_v3 WHERE page_ded=1;';

echo $requete;

echo 'SELECT ROW_COUNT();';
