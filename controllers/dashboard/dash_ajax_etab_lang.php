<?php

require 'db_connection.php';
$datatable = new \datatable\DashEtab;

$nomLangue = get(0, null);

$datatable->setNomLangue($nomLangue);

echo $datatable->run();

