<?php
session_start();

//����Ƿ��¼����û��¼��ת���¼����
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