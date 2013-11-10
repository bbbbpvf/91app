<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>我的图片墙</title>
</head>
<body>
<?php
 //遍历Domain下所有文件
 $stor = new SaeStorage();
 $url=$stor->getUrl("test",$n);
 echo $n."<br/><br/>";
 $num = 0;
 while ( $ret = $stor->getList("test", "*", 100, $num ) ) {
         foreach($ret as $file) {
             echo "<img src=\"{$url}{$file}\" height=\"150\" width=\"150\"> \n";
             $num ++;
         }
 }

 echo "<br/>\nTOTAL: {$num} files\n";
 ?>
</body>
</html>