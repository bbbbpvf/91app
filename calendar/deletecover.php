<?php
session_start();

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//�������ݿ������ļ�
include('conn.php');
  $cid=$_POST["cid"];
  $dsql = "DELETE FROM cover WHERE id=". $cid.";";
  $result = mysql_query($dsql);
  if($result){
	echo "delete success";
  } else {
	echo "delete failed to execute sql:" . $dsql;
  }
?>