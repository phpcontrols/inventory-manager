<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_GET['currentPage'] = 'barcodes';

require_once dirname(__DIR__) . '/inventory-manager-master/vendor/autoload.php';
include_once('inc/head.php');
?>

<h1>My Inventory Manager</h1>

<?
include_once('inc/menu.php');

use phpGrid\C_DataBase;

$db = new C_DataBase(PHPGRID_DB_HOSTNAME, PHPGRID_DB_USERNAME, PHPGRID_DB_PASSWORD, PHPGRID_DB_NAME, PHPGRID_DB_TYPE,PHPGRID_DB_CHARSET);

$results = $db->db_query('SELECT * FROM products');
$data1 = array();
$count = 0;

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

echo '<ul class="barcode">';
while($row = $db->fetch_array_assoc($results)) {
	for($i = 0; $i < $db->num_fields($results); $i++) {
	    $col_name = $db->field_name($results, $i);
	    $data1[$count][$col_name] = $row[$col_name];
	}

	$code = str_pad($data1[$count]['id'], 8, '0', STR_PAD_LEFT);
	$label = $data1[$count]['ProductLabel'];

	echo '<li><div>';
	echo $generator->getBarcode($code, $generator::TYPE_CODE_128, 2, 50);
	echo "<div>$code</div>";
	echo "<div>$label</div>";
	echo '</div></li>';

	$count++;

}
echo '</ul>';

include_once('inc/footer.php');
