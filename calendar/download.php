<?php
include('conn.php');
$aid=$_GET["aid"];
$deviceid=$_GET["deviceid"];
$sql = "UPDATE app SET  count = count+1 WHERE id =".$aid;
$result = mysql_query($sql);
if($result){
	echo "update success;";
}else {
	echo "update failded in execute sql:". $sql; 
}
$sql = "insert into dlog values(".$aid.",".$deviceid.",".time().")";
$result = mysql_query($sql);
if($result){
	echo "log success;";
}
else {
	echo "log failded in execute sql:". $sql; 
}
?>