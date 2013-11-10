<?php
include('conn.php');
$aid=$_GET["aid"];
$sql = "SELECT count from app WHERE id =".$aid;
$result = mysql_query($sql);
if($row = mysql_fetch_array($result))
{
echo $row['count'];
}
?>