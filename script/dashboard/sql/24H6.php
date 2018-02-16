<?php

require_once(__DIR__.'/../config-parameter-dash.php');

$requete='
INSERT INTO `'.$dbname_storage.'`.####
(####, ####, ####)
SELECT t.####, t.####, t.####
FROM (
	SELECT ####, SUM(e.champs_plein) as plein, SUM(e.champs_vide)as vide
	FROM `'.$dbname_storage.'`.#### AS e
	GROUP BY e.####
) AS t
ON DUPLICATE KEY UPDATE
`'.$dbname_storage.'`.####.totaux_champs_plein = t.plein,
`'.$dbname_storage.'`.####.totaux_champs_vide = t.vide;
SELECT ROW_COUNT();';

echo $requete;
