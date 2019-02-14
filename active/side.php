<?php
require_once("mytcg/settings.php");
require_once("func_date.php");

$select6 = mysqli_query($connect, "SELECT * FROM `activity` ORDER BY `date` DESC LIMIT 10");
$count6 = mysqli_num_rows($select6);

if($count6==0) {
  echo "<center>This member has no activity going on!</center>";
}
else {
  echo "<table width=\"100%\" class=\"table table-striped\" align=\"center\">\n";
  while($row6=mysqli_fetch_assoc($select6)) {
    $namename = $row6[name];
    $date = $row6['date'];

    $content = $row6[content];
  if (strlen($content) > 100) { 
  $content = substr($content, 0, 100) . "..."; }
    
    if($namename == "$tcgname") { $avatar2 = "$tcgurl/images/avatars/$tcgname.png"; } else {
    
    $select = mysqli_query($connect, "SELECT * FROM `$table_members` WHERE `name`='" . $namename . "'");
    while($row=mysqli_fetch_assoc($select)) {
    $avatar = $row[avatar];
    $avatar2 = "$avatar";
    }
    }
    echo "<tr><td width=\"10%\" align=\"center\"><a href=\"$tcgurl/profile.php?id=$namename\"><img src=\"$avatar2\" width=\"20px\" height=\"20px\" title=\"$namename\" /></a><td width=\"80%\">$row6[action] &nbsp; <a href=\"$tcgurl/activity.php?id=$row6[id]\" title=\"$date\">";
    
    echo time_ago($date);
    echo "</a>";
    if($content==NULL) {} else { echo "<br /><em>$content</em>"; }
    echo "</td></tr>\n";
  }
  echo "</table>\n";
} ?>