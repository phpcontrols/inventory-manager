<?php
use phpGrid\C_DataGrid;

require_once("phpGrid/conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> | Custom CRM</title>
<style>
body {
   padding: 0 15px;
   margin: 0 15px;
}
.ui-jqgrid-htable th,
.ui-jqgrid tr.jqgrow td{ 
    text-transform: capitalize; 
}
.ui-jqgrid-htable th div{
    font-weight: bold;
}
#menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

#menu ul li {
    float: left;
}

#menu  ul li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
#menu  ul li a:hover,
#menu .active {
    background-color: #ddd;
    color:black;
}
</style>
</head>
<body>

<h1>Custom CRM</h1>
<div id="menu">
    <ul>
        <li><a href="dashboard.php" class="active">Dashboard</a></li>
        <li><a href="leads.php">Leads</a></li>
        <li><a href="opportunities.php">Opportunities</a></li>
        <li><a href="customerwon.php">Customer/Won</a></li>
        <li><a href="calendar.php">Calendar</a></li>
    </ul>
</div>

<h3>Dashboard</h2>
<?php
// ..phpGrid code goes here
?>

</body>
</html>