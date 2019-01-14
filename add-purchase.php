<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_GET['currentPage'] = 'incoming';

use phpGrid\C_DataGrid;

require_once dirname(__DIR__) . '/inventory-manager-master/vendor/autoload.php';
include_once('inc/head.php');
include_once('inc/menu.php');

$dgPur = new C_DataGrid('SELECT id, PurchaseDate, ProductId, NumberReceived, SupplierId FROM purchases', 'id', 'purchases');
$dgPur->set_col_hidden('id', false);

$dgPur->set_col_title('PurchaseDate', 'Date of Purchase');
$dgPur->set_col_title('ProductId', 'Product');
$dgPur->set_col_title('NumberReceived', 'Number Received');
$dgPur->set_col_title('SupplierId', 'Supplier');

$dgPur->set_col_edittype('ProductId', 'autocomplete', "select id, ProductLabel from products");
$dgPur->set_col_edittype('SupplierId', 'autocomplete', "select id, supplier from suppliers");

$dgPur->enable_edit('FORM')->set_theme('cobalt');
$dgPur->form_only();

$dgPur->display();

?>

<script>
jQuery(document).ready(function($){ 
	$.extend(true, $.jgrid.edit, {
	    recreateForm: true,
	    beforeShowForm: function ($form) {
	        $form.closest(".ui-jqdialog").position({
	            of: window, // or any other element
	            my: "center center",
	            at: "center center"
	        });
	    }
	});
})
</script>