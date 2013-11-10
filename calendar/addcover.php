<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
include('conn.php');
?>
<?php
echo $HTTP_RAW_POST_DATA;
  
$cid=$_POST["cid"];
$date=$_POST["date"];
$title=$_POST["title"];
$subtitle=$_POST["subtitle"];
$photo=$_POST["photo"];
$time = strtotime($date);

if(empty($cid)||$cid=='0') {
$sql="INSERT INTO cover (
`title` ,
`subtitle` ,
`time` ,
`photo`
) VALUES ('".$title."','".$subtitle."','".$time."','".$photo."');";
} else {
$dsql = "delete from cover where id=". $cid .";";
$result = mysql_query($dsql);
if($result){
	echo "delete success;";
} else {
	echo "delete failded in execute sql:". $dsql; 
}
$sql="INSERT INTO cover (
`id` , 
`title` ,
`subtitle` ,
`time` ,
`photo`
) VALUES (".$cid.",'".$title."','".$subtitle."','".$time."','".$photo."');";
}

$result = mysql_query($sql);

if($result){
	echo "add success;";
} else {
	echo "add failded in execute sql:". $sql; 
}

?>
