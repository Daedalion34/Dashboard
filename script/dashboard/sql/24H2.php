<?php

require_once(__DIR__.'/../config-parameter-dash.php');

$requete='
TRUNCATE TABLE `'.$dbname_storage.'`.####;
TRUNCATE TABLE `'.$dbname_storage.'`.####;
TRUNCATE TABLE `'.$dbname_storage.'`.####;

INSERT INTO `'.$dbname_storage.'`.#### (####)
VALUE (\'####\'), (\'####\'),
(\'####\'), (\'####\');
SELECT ROW_COUNT();

INSERT INTO
	`'.$dbname_storage.'`.#### (####)
SELECT
	`####`
FROM
	`'.$dbname.'`.#### AS hc
	ORDER BY hc.####;
-- ON DUPLICATE KEY UPDATE
-- `'.$dbname_storage.'`.####.#### = hc.`####`;
SELECT ROW_COUNT();


INSERT INTO
	`'.$dbname_storage.'`.#### (####)
SELECT
	####
FROM
	`'.$dbname.'`.####;
-- ON DUPLICATE KEY UPDATE
-- `'.$dbname_storage.'`.####.####=`'.$dbname.'`.####.####;';

echo $requete;
echo 'SELECT ROW_COUNT();';
