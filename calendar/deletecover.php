<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}

//包含数据库连接文件
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