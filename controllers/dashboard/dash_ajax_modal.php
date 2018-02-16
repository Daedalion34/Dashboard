<?php
require 'db_connection.php';

$testName = new \modeles\dashboard\Etabs;
$MLangue = new \modeles\dashboard\Langue;
$MmodalLangue = new \modeles\dashboard\EtabsLangue;

$idetab = get(0, null);
$langue = get(1, null);

$switchLangue = $MLangue->getIdLangueForNom($langue);

$AlltestName = $testName->getModal($idetab, $switchLangue);

echo '<pre>';
echo $AlltestName['####'];
echo '<BR>';

echo $AlltestName['####'];
echo '<BR>';

echo $AlltestName['####'];
echo '</pre>';
