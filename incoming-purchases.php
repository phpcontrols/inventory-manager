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

<button class="add-new-row">Add New Purchase</button>

<?php
$dgPur = new C_DataGrid('SELECT id, PurchaseDate, ProductId, NumberReceived, SupplierId FROM purchases', 'id', 'purchases');
$dgPur->set_col_hidden('id', false);

$dgPur->set_col_title('PurchaseDate', 'Date of Purchase');
$dgPur->set_col_title('ProductId', 'Product');
$dgPur->set_col_title('NumberReceived', 'Number Received');
$dgPur->set_col_title('SupplierId', 'Supplier');

$dgPur->set_col_edittype('ProductId', 'autocomplete', "select id, concat(lpad(id, 8, '0'), ' | ', ProductLabel) from products");
$dgPur->set_col_edittype('SupplierId', 'autocomplete', "select id, supplier from suppliers");

// $dgPur->enable_edit('FORM');
$dgPur->set_pagesize(100);

$dgPur->set_col_width('PurchaseDate', '50px');
$dgPur->set_col_width('NumberReceived', '35px');

$dgPur -> set_group_properties('ProductId', false, true, true, false);
$dgPur -> set_group_summary('NumberReceived','sum');

$dgPur->enable_autowidth(true);

$dgPur->enable_edit('FORM');
$dgPur->display();
?>

Incoming orders increase inventory.

<script>
$(function(){	
	$(".add-new-row").on("click",function(){
		$("#add_purchases").click();
	});
});
</script>

<?php
include_once('inc/footer.php');
?>