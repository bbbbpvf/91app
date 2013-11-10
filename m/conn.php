<?php
/*用户名　 : SAE_MYSQL_USER
*密　　码 : SAE_MYSQL_PASS
*主库域名 : SAE_MYSQL_HOST_M
*从库域名 : SAE_MYSQL_HOST_S
*端　　口 : SAE_MYSQL_PORT
*数据库名 : SAE_MYSQL_DB/

/*****************************
*数据库连接
*****************************/
$conn = @mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if (!$conn){
    die("连接数据库失败：" . mysql_error());
}
mysql_select_db(SAE_MYSQL_DB, $conn);
//字符转换，读库
//mysql_query("set character set 'gbk'");
//写库
//mysql_query("set names 'gbk'");

//检查表是否存在
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