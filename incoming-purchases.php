<?php
use phpGrid\C_DataGrid;

include_once("phpGrid/conf.php");
include_once('inc/head.php');
?>

<h1>My Inventory Manager</h1>

<?php
$_GET['currentPage'] = 'incoming';
include_once('inc/menu.php');
?>

<?php
$dgPur = new C_DataGrid('SELECT id, PurchaseDate, ProductId, NumberReceived, SupplierId FROM purchases', 'id', 'purchases');
$dgPur->set_col_hidden('id', false);

$dgPur->set_col_title('PurchaseDate', 'Date of Purchase');
$dgPur->set_col_title('ProductId', 'Product');
$dgPur->set_col_title('NumberReceived', 'Number Received');
$dgPur->set_col_title('SupplierId', 'Supplier');

$dgPur->set_col_edittype('ProductId', 'select', "select id, ProductLabel from products");
$dgPur->set_col_edittype('SupplierId', 'select', "select id, supplier from suppliers");

// $dgPur->enable_edit('FORM');
$dgPur->set_pagesize(100);

$dgPur->set_col_width('PurchaseDate', '50px');
$dgPur->set_col_width('NumberReceived', '35px');

$dgPur -> set_group_properties('ProductId', false, true, true, false);
$dgPur -> set_group_summary('NumberReceived','sum');

$dgPur->enable_autowidth(true);
$dgPur->display();
?>

Incoming orders increase inventory.

<style>
.number-columns{
	font-weight: 700 !important;
}

<?php
include_once('inc/footer.php');
?>