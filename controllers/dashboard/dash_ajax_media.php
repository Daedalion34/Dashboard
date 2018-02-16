
<?php

require 'db_connection.php';
$datatable = new \datatable\DashMedia;
echo $datatable->run();
