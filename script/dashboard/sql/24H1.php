<?php
/*
explication requete:
On vide la table avec TRUNCATE.
Le SELECT ROW_COUNT(); sert dans putty pour savoir le nombre de ligne
*/
require_once(__DIR__.'/../config-parameter-dash.php');


$requete='
TRUNCATE TABLE `'.$dbname_storage.'`.####;

INSERT INTO `'.$dbname_storage.'`.#### (
####, ####, ####,
####, ####, ####,
####, ####
)
SELECT
e.####, e.####, dri.####, dvi.####, dpi.####,
(
SELECT
COUNT(ei.####)
FROM
`'.$dbname.'`.#### AS ei
WHERE
ei.#### = e.####
),
(
SELECT
COUNT(en.####)
FROM
`'.$dbname.'`.#### AS en
WHERE
en.#### = e.####
AND en.#### != \'\'
),
(
SELECT
COUNT(en.####)
FROM
`'.$dbname.'`.#### AS en
WHERE
en.#### = e.####
AND en.#### != \'\'
)
FROM
`'.$dbname.'`.#### AS e
LEFT JOIN `'.$dbname.'`.#### AS dvi ON dvi.#### = e.####
AND dvi.idlangue = "FR"
LEFT JOIN `'.$dbname.'`.#### AS dri ON dri.#### = e.####
AND dri.#### = "FR"
LEFT JOIN `'.$dbname.'`.#### AS dr ON dr.#### = dri.####
LEFT JOIN `'.$dbname.'`.#### AS dpi ON dpi.#### = dr.####
AND dpi.#### = "FR"
WHERE
e.#### < 1000;

SELECT ROW_COUNT();';

echo $requete;
