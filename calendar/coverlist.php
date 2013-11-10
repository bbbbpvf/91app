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
<?php
$date1=$_GET["date1"];
$date2=$_GET["date2"];

echo "<P>date1:" . $date1 . "~" . $date2 . "</P>";

$startTime = strtotime($date1);

$endTime = strtotime($date2);

$sql="SELECT * FROM cover WHERE time Between '".$startTime."' And '". $endTime ."' order by time desc";

echo "sql:" . $sql;

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Date</th>
<th>ID</th>
<th>Title</th>
<th>SubTitle</th>
<th>Photo</th>
<th>Action</th>
</tr>";

while($row = mysql_fetch_array($result))
 {
 $cid = $row['id'];
 echo "<tr>";
 echo "<td>" . date('Y-m-d', $row['time']) . "</td>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['title'] . "</td>";
 echo "<td>" . $row['subtitle'] . "</td>";
 echo "<td>" . $row['photo'] . "</td>";
 echo "<td><a onclick=\"editcover('".$cid."','".$row['title']."','".$row['subtitle']."','".$row['photo']."','".date('Y-m-d', $row['time'])."')\">Edit</a>  <a onclick=\"deletecover('".$cid."')\">Delete</a>   <a href=\"applist.html?".$cid."\" target=\"_BLANK\">View Apps</a></td>";
 echo "</tr>";
 }
echo "</table>";
echo "<P><button type=\"button\" onclick=\"showcovereditor()\">New</button>
</P>";
?>
</BODY>
</HTML>

