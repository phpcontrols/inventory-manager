<?php
use phpGrid\C_DataGrid;

include_once("phpGrid/conf.php");
require_once("phpChart/conf.php");
include_once('inc/head.php');
?>

<h1>My Inventory Manager Reports</h1>

<?php
$_GET['currentPage'] = 'reports';
include_once('inc/menu.php');
?>

<br />
<div id="label_info"></div>


<?php
$pc = new C_PhpChartX(array(array(null)), 'PieChart');
$pc->set_title(array('text'=>'Current Inventory Summary'));
$pc->set_series_default(array( 'shadow'=> false, 
    'renderer'=> 'plugin::PieRenderer', 
    'rendererOptions'=> array( 
      'showDataLabels' => true,
      'highlightMouseOver' => true,
      'startAngle'=> 180, 
      'sliceMargin'=> 4, 
      'showDataLabels'=> true ) 
  ));
$pc->set_legend(array('show'=>true,'location'=> 'w'));
// remove grids.
$pc->set_grid(array(
    'background'=>'white',
    'borderWidth'=>0,
    'borderColor'=>'#000000',
    'shadow'=>false));
$pc->add_custom_js("
        $('#PieChart').bind('jqplotDataHighlight',
            function (ev, seriesIndex, pointIndex, data) {
               $('#label_info').text(data);      
            }
        );
    ");
$pc->draw(660,400);  
?>

<?php
$dgProd = new C_DataGrid('SELECT id, ProductLabel, InventoryReceived FROM products', 'id', 'products');
$dgProd->set_col_hidden('id', false);
$dgProd->set_dimension('auto', 'auto')->set_pagesize(100);
$onGridLoadComplete = <<<ONGRIDLOADCOMPLETE
function(status, rowid)
{
	var dataX = [];
	var dataY = [];

	d1 = $('#products').jqGrid('getCol', 'ProductLabel', false);
	d2 = $('#products').jqGrid('getCol', 'InventoryReceived', false);
	
	npoints = d1.length;
	for(var i=0; i < npoints; i++){
		dataX[i] = [i+1, d1[i]];
		dataY[i] = [i+1, parseInt(d2[i])];
	}

    var pieData = [];
    for(var j=0; j < dataX.length; j++)
    {
        pieData.push([dataX[j][1], dataY[j][1]]);
    }
    console.log(pieData);
    _PieChart.series[0].data = pieData;
    _PieChart.replot({resetAxes:true});
}
ONGRIDLOADCOMPLETE;
$dgProd->add_event("jqGridLoadComplete", $onGridLoadComplete);
$dgProd->display();
?>

<style>
div#resizable,
div#gbox_products{
  float: left;
}
#label_info{
  color:green;
}
</style>

<?php
include_once('inc/footer.php');
?>