<?php
session_start();

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//�������ݿ������ļ�
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
<meta name="Copyright" content="��JavaScript������ http://www.ijavascript.cn/" />
<meta name="description" content="������˵�JavaScriptѧϰ����,����õ�JavaScript���Ϸ���վ��" />
<meta content="����Ư����js�����ؼ�,��JavaScript������" name="keywords" />
<title>����Ư����js�����ؼ���ʾ - ��JavaScript������</title>
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
			alert("����ʹ�ã�");
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
			<legend>ѡ������</legend>
			<div>
			<label for="date1">��ʼ����</label>
			<input id="date1" name="date1" type="text" />
			</div>
			<div>
			<label for="date2">��������</label>
			<input id="date2" name="date2" type="text" />
			</div>
			<div>
			<input type="submit" name="submit" value="��ѯ" onclick="dosubmit()"/>
			</div>
		</fieldset>
		
	</form>
	
	<p>
	<div id="resultHint">
<?php
	echo "<P><button type=\"button\" onclick=\"addcover()\">���</button>
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
 echo "<td>�༭  ɾ��   �鿴apps</td>";
 echo "</tr>";
 }
echo "</table>";

	?>
	</div>
	</p>
</BODY>
</HTML>
