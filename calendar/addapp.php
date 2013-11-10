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
  
$aid=$_POST["aid"];
$date=$_POST["date"];
$title=addslashes($_POST["title"]);
$subtitle=addslashes($_POST["subtitle"]);
$description=addslashes($_POST["description"]);
$count=$_POST["count"];
$score=$_POST["score"];
$oldprice=$_POST["oldprice"];
$newprice=$_POST["newprice"];
$url=addslashes($_POST["url"]);
$photos=addslashes($_POST["photos"]);
$flag = $_POST["flag"];
$cid = $_POST["cid"];
$time = strtotime($date);


if(empty($aid)||$aid=='0') {
$sql="INSERT INTO app (
`title`, `subtitle`, `time`, `description`, `count`, `score`, `oldprice`, `newprice`, `url`, `photos`, `flag`, `cid`
) VALUES ('".$title."','".$subtitle."','".$time."','".$description."','".$count."','".$score."','".$oldprice."','".$newprice."','".$url."','".$photos."','".$flag."','".$cid."');";
} else {
$dsql = "delete from app where id=". $aid .";";
$result = mysql_query($dsql);
if($result){
	echo "delete success;";
} else {
	echo "delete failded in execute sql:". $dsql; 
}
$sql="INSERT INTO app (
`id` , 
`title`, `subtitle`, `time`, `description`, `count`, `score`, `oldprice`, `newprice`, `url`, `photos`, `flag`, `cid`
) VALUES (".$aid.",'".$title."','".$subtitle."','".$time."','".$description."','".$count."','".$score."','".$oldprice."','".$newprice."','".$url."','".$photos."','".$flag."','".$cid."');";
}

$result = mysql_query($sql);

if($result){
	echo "add success;";
} else {
	echo "add failded in execute sql:". $sql; 
}

?>
