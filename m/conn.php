<?php
/*�û����� : SAE_MYSQL_USER
*�ܡ����� : SAE_MYSQL_PASS
*�������� : SAE_MYSQL_HOST_M
*�ӿ����� : SAE_MYSQL_HOST_S
*�ˡ����� : SAE_MYSQL_PORT
*���ݿ��� : SAE_MYSQL_DB/

/*****************************
*���ݿ�����
*****************************/
$conn = @mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if (!$conn){
    die("�������ݿ�ʧ�ܣ�" . mysql_error());
}
mysql_select_db(SAE_MYSQL_DB, $conn);
//�ַ�ת��������
//mysql_query("set character set 'gbk'");
//д��
//mysql_query("set names 'gbk'");

//�����Ƿ����
$result = mysql_query("show tables");
$i=0;
$array = array();
while($i<mysql_num_rows($result))
{
	$array[$i] = mysql_tablename($result,$i);
	$i++;
}
if(!in_array("admin",$array)){
	//create table admin	
	$sql="CREATE TABLE admin(
		`uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
		`username` varchar(45) NOT NULL,
		`password` varchar(45) NOT NULL,
		`email` varchar(45) NOT NULL,
		`regdate` datetime NOT NULL,
		PRIMARY KEY (`uid`) USING BTREE
		) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";
	mysql_query($sql,$conn);
}
?>