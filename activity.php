<?php session_start();if (isset($_SESSION['USR_LOGIN'])=="") {	header("Location:../login.php");}
include("mytcg/settings.php");
include("$header"); 

require_once("func_date.php");

if(!$_SERVER['QUERY_STRING']) {
?>
<div id="act_main">
<?php
include("active/main.php"); 
?>
</div>
<?php
}
if($id = !$_GET['id']) {}
	
else {
$id = $_GET['id'];
$query_act="SELECT * FROM `activity` WHERE id='$id' LIMIT 1";
$result_act=mysqli_query($connect, $query_act);
?>
<div id="act_main2">
<?php
include("active/main2.php");
?>
</div>
<?php
}
include("$footer");?>