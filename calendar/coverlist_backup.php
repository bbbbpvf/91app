<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
include('conn.php');
$date1=$_GET["date1"];
$date2=$_GET["date2"];

echo "<P>date1:" . $date1 . "~" . $date2 . "</P>";

$startTime = strtotime($date1);

$endTime = strtotime($date2);

$sql="SELECT * FROM cover WHERE time Between '".$startTime."' And '". $endTime ."' order by time desc";

echo "sql:" . $sql;

$result = mysql_query($sql);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta name="Copyright" content="爱JavaScript中文网 http://www.ijavascript.cn/" />
<meta name="description" content="分享个人的JavaScript学习经历,做最好的JavaScript资料分享站点" />
<meta content="三款漂亮的js日历控件,爱JavaScript中文网" name="keywords" />
<title>三款漂亮的js日历控件演示 - 爱JavaScript中文网</title>
	<script src="editcover.js"></script>
	<script type="text/javascript" src="js/mootools.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="prototype.js"></script>
	<script type="text/javascript">		
		window.addEvent('domready', function() { 
			myCal1 = new Calendar({ date1: 'Y-m-d', date2: 'Y-m-d' });
		});
	</script>
	<script language="javascript">
		function addcover()
		{
			alert("可以使用！");
		}
		function dosubmit( ) {
		new Ajax.Updater( 'result', 'edit_cover.php', { method: 'post',
		parameters: $('myform').serialize() } );
	}
</script>
	<link rel="stylesheet" type="text/css" href="css/iframe.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/calendar.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/dashboard.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/i-heart-ny.css" media="screen" />
</head>

<BODY>
	<h1>Style-able and semantic XHTML</h1>

	</p>

	<form  id="myform">
		<fieldset>
			<legend>选择日期</legend>
			<div>
			<label for="date1">开始日期</label>
			<input id="date1" name="date1" type="text" />
			</div>
			<div>
			<label for="date2">结束日期</label>
			<input id="date2" name="date2" type="text" />
			</div>
			<div>
			<input type="submit" name="submit" value="查询" onclick="dosubmit()"/>
			</div>
		</fieldset>
		
	</form>
	
	<p>
	<div id="resultHint">
<?php
	echo "<P><button type=\"button\" onclick=\"addcover()\">添加</button>
</P>
<table border='1'>
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
 echo "<tr>";
 echo "<td>" . date('Y-m-d', $row['time']) . "</td>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['title'] . "</td>";
 echo "<td>" . $row['subtitle'] . "</td>";
 echo "<td>" . $row['photo'] . "</td>";
 echo "<td>编辑  删除   查看apps</td>";
 echo "</tr>";
 }
echo "</table>";

	?>
	</div>
	</p>
</BODY>
</HTML>
