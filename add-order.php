<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo dirname(__DIR__) . '/inventory-manager-master/vendor/autoload.php';
require_once dirname(__DIR__) . '/inventory-manager-master/vendor/autoload.php';

//*
use phpGrid\C_DataGrid;

include_once('inc/head.php');

$dgPur = new C_DataGrid('SELECT id, PurchaseDate, ProductId, NumberReceived, SupplierId FROM purchases', 'id', 'purchases');
$dgPur->display();
/**/

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
echo $generator->getBarcode('SKU-S-1R', $generator::TYPE_CODE_128);

echo '<br><br>';

echo $generator->getBarcode('2342343243234', $generator::TYPE_CODE_128);
