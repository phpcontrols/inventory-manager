<?php
use phpGrid\C_DataGrid;

include_once("phpGrid/conf.php");
include_once('inc/head.php');
?>

<h1>My Inventory Manager</h1>

<?php
$_GET['currentPage'] = 'outgoing';
include_once('inc/menu.php');
?>

<button class="add-new-row">Add New Order</button>


<?php
$dgOrd = new C_DataGrid('SELECT id, OrderDate, ProductId, NumberShipped, First, Last FROM orders', 'id', 'orders');
$dgOrd->set_sortname('OrderDate', 'DESC');
$dgOrd->set_col_hidden('id', false);

$dgOrd->set_col_title('OrderDate', 'Order Date');
$dgOrd->set_col_title('ProductId', 'Product');
$dgOrd->set_col_title('NumberShipped', 'Number Shipped');

$dgOrd->set_col_edittype('ProductId', 'autocomplete', "select id, ProductLabel from products");

// $dgOrd->enable_edit('FORM');
$dgOrd->set_pagesize(100);

$dgOrd->set_col_width('OrderDate', '30px');
$dgOrd->set_col_width('NumberShipped', '35px');
$dgOrd->set_col_width('First', '20px');
$dgOrd->set_col_width('Last', '20px');

$dgOrd->set_grid_method('setGroupHeaders', array(
                                array('useColSpanStyle'=>true),
                                'groupHeaders'=>array(
                                        array('startColumnName'=>'First',
                                              'numberOfColumns'=>2,
                                              'titleText'=>'Customer Name') )));

$dgOrd->enable_autowidth(true);
$dgOrd->enable_edit('FORM');

$dgOrd->display();
?>

Outgoing orders reduce inventory.

<script>
$(function(){	
	$(".add-new-row").on("click",function(){
		$("#add_orders").click();
	});
});
</script>

<?php
include_once('inc/footer.php');
?>