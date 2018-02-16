<?php

$opt = getopt('', ['####:', '####:']);

$dbname_storage        = $opt['####'];
$dbname                = $opt['####'];
$requete_champs_pleins = '';
$requete_champs_vides  = '';
$requete_columns_name  = '';
