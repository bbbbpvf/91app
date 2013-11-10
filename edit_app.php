<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
include('conn.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
if($_POST['title'] && $_POST['sort'] && $_POST['content'] && $_GET['op']=="add"){

}
?>