<?php
$id = $_GET['id'];

require_once("/mytcg/settings.php");
require_once("/func_date.php");

if($id = !$_GET['id']) {}
	
else {
$id = $_GET['id'];
$query_act="SELECT * FROM `activity` WHERE id='$id' LIMIT 1";
$result_act=mysqli_query($connect, $query_act);
echo "<h1>Activity</h1>";
echo "<table width=\"100%\" class=\"table table-striped\" align=\"center\">\n";
while ($row_act=mysqli_fetch_assoc($result_act)) {

$namename = $row_act[name];
$date = $row_act['date'];
$content = $row_act[content];
		
		if($namename == "$tcgname") { $avatar2 = "$tcgurl/images/avatars/$tcgname.png"; } else {
		
		$select = mysqli_query($connect, "SELECT * FROM `$table_members` WHERE `name`='" . $namename . "'");
		while($row=mysqli_fetch_assoc($select)) {
		$avatar = $row[avatar];
		$avatar2 = "$avatar";
		}
		}
		echo "<tr><td width=\"10%\" align=\"center\"><a href=\"$tcgurl/profile.php?id=$namename\"><img src=\"$avatar2\" width=\"50px\" height=\"50px\" class=\"propic\" title=\"$namename\" /></a><td width=\"80%\">$row_act[action] &nbsp; <a href=\"\" title=\"$date\">";
		
		echo time_ago($date);
		echo "</a>";
		if($content==NULL) {} else { echo "<br /><em>$content</em>"; }
		echo "</td></tr>\n";
	}
	echo "</table>\n"; } ?>