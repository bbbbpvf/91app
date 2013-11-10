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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
</head>
<BODY>

<table border='1'>
<tr>
<th>Date</th>
<th>ID</th>
<th>Title</th>
<th>SubTitle</th>
<th>Description</th>
<th>Count</th>
<th>Score</th>
<th>OldPrice</th>
<th>NewPrice</th>
<th>Url</th>
<th>Photos</th>
<th>Flag</th>
<th>Action</th>
</tr>

<?php
$cid=$_GET["cid"];
$sql="SELECT * FROM app WHERE cid = ".$cid.";";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
 {
 $aid = $row['id'];
 echo "<tr>";
 echo "<td>" . date('Y-m-d', $row['time']) . "</td>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['title'] . "</td>";
 echo "<td>" . $row['subtitle'] . "</td>";
 echo "<td>" . $row['description'] . "</td>";
 echo "<td>" . $row['count'] . "</td>";
 echo "<td>" . $row['score'] . "</td>";
 echo "<td>" . $row['oldprice'] . "</td>";
 echo "<td>" . $row['newprice'] . "</td>";
 echo "<td>" . $row['url'] . "</td>";
 echo "<td>";
 $photos = explode('|',$row['photos']);
 foreach ($photos as $value){
	echo "<img src=\"".$value."\"/><P>";
 }
 echo "</td>";
 echo "<td>" . $row['flag'] . "</td>";
 echo "<td><a onclick=\"showappeditor('".$aid."','".urlencode($row['title'])."','".urlencode($row['subtitle'])."','".urlencode($row['description'])."','".$row['count']."','".$row['score']."','".$row['oldprice']."','".$row['newprice']."','".urlencode($row['url'])."','".urlencode($row['photos'])."','".$row['flag']."','".$row['date']."')\">Edit</a>  <a onclick=\"deleteapp('".$aid."')\">Delete</a></td>";
 echo "</tr>";
 }
echo "</table>";
echo "<P><button type=\"button\" onclick=\"showappeditor()\">New</button>
</P>";
?>
</BODY>
</HTML>