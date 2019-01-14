<?php
use phpGrid\C_DataGrid;

include_once("phpGrid/conf.php");
include_once('inc/head.php');
?>

<h1>My Inventory Manager</h1>

<?php
$_GET['currentPage'] = 'products';
include_once('inc/menu.php');
?>

<?php
$dgProd = new C_DataGrid('SELECT * FROM products', 'id', 'products');
$dgProd->set_col_hidden('id', false);
$dgProd->enable_autowidth(true)->set_dimension('auto', '200px')->set_pagesize(100);

$dgProd->set_col_title('ProductName', 'Name');
$dgProd->set_col_title('PartNumber', 'Part Number');
$dgProd->set_col_title('ProductLabel', 'Label');
$dgProd->set_col_title('StartingInventory', 'Starting Inventory');
$dgProd->set_col_title('InventoryReceived', 'Inventory Received');
$dgProd->set_col_title('InventoryShipped', 'Inventory Shipped');
$dgProd->set_col_title('InventoryOnHand', 'Inventory On Hand');
$dgProd->set_col_title('MinimumRequired', 'Minimum Required');

$dgProd->set_col_format('StartingInventory', 'integer', array('thousandsSeparator'=>',', 'defaultValue'=>'0'));
$dgProd->set_col_format('InventoryReceived', 'integer', array('thousandsSeparator'=>',', 'defaultValue'=>'0'));
$dgProd->set_col_format('InventoryShipped', 'integer', array('thousandsSeparator'=>',', 'defaultValue'=>'0'));
$dgProd->set_col_format('InventoryOnHand', 'integer', array('thousandsSeparator'=>',', 'defaultValue'=>'0'));
$dgProd->set_col_format('MinimumRequired', 'integer', array('thousandsSeparator'=>',', 'defaultValue'=>'0'));

$dgProd->set_conditional_format('InventoryOnHand', 'CELL', array("condition"=>"lt",
                                                  "value"=>"1",
                                                  "css"=> array("color"=>"red","background-color"=>"#DCDCDC")));

$dgProd->set_col_property('StartingInventory', array('classes'=>'number-columns'));
$dgProd->set_col_property('InventoryReceived', array('classes'=>'number-columns'));
$dgProd->set_col_property('InventoryShipped', array('classes'=>'number-columns'));
$dgProd->set_col_property('InventoryOnHand', array('classes'=>'number-columns'));
$dgProd->set_col_property('MinimumRequired', array('classes'=>'number-columns'));

$onGridLoadComplete = <<<ONGRIDLOADCOMPLETE
function(status, rowid)
{
    var ids = jQuery("#products").jqGrid('getDataIDs');
    for (var i = 0; i < ids.length; i++)
    {
        var rowId = ids[i];
        var rowData = jQuery('#products').jqGrid ('getRowData', rowId);

        var inventoryOnHand = $("#products").jqGrid("getCell", rowId, "InventoryOnHand");
        var minimumRequired = $("#products").jqGrid("getCell", rowId, "MinimumRequired");

        // compare two dates and set custom display in another field "status" 
        console.log(inventoryOnHand + " | " + minimumRequired);
        if(parseInt(inventoryOnHand) < parseInt(minimumRequired)){
            
            $("#products").jqGrid("setCell", rowId, "PartNumber", '', {'background-color':'gold'}); 
                
        }
    }

}
ONGRIDLOADCOMPLETE;
$dgProd->add_event("jqGridLoadComplete", $onGridLoadComplete);
$dgProd->enable_edit('FORM');

// Purchases detail grid
$dgPur = new C_DataGrid('SELECT id, PurchaseDate, ProductId, NumberReceived, SupplierId FROM purchases', 'id', 'purchases');
$dgPur->set_col_hidden('id', false)->set_caption('Incoming Purchases');
$dgPur->set_col_edittype('ProductId', 'select', "select id, ProductLabel from products");
$dgPur->set_col_edittype('SupplierId', 'select', "select id, supplier from suppliers");
$dgPur->set_dimension('800px');

// Orders detail grid
$dgOrd = new C_DataGrid('SELECT id, OrderDate, ProductId, NumberShipped, First, Last FROM orders', 'id', 'orders');
$dgOrd->set_sortname('OrderDate', 'DESC')->set_caption('Outgoing Orders');
$dgOrd->set_col_hidden('id', false);
$dgOrd->set_col_edittype('ProductId', 'select', "select id, ProductLabel from products");
$dgOrd->set_dimension('800px');

$dgProd->set_masterdetail($dgPur, 'ProductId', 'id');
$dgProd->set_masterdetail($dgOrd, 'ProductId', 'id');
$dgProd->display();
?>

<span style="background-color:gold">______</span> -- Indicating inventory that needs reorder.<br />
<span style="background-color:#DCDCDC">______</span> -- Negative inventory on hand!

<style>
.number-columns{
	font-weight: 700 !important;
}
</style>


<?php
include_once('inc/footer.php');
?>