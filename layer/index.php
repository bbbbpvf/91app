<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript">
function doclose()
{
 parent.Close();
}
</script> 
<title>上传文件</title>
</head>
<body>
<p><a href="listfiles.php" target="_blank">所有文件</a></p>
<img id="tag_img" src="" />
<form enctype="multipart/form-data" action="upload.php" target="targetframe" method="post">
<input name='myfile' type='file'/>
<input type="submit" value="上传"/>
</form>
<input type="button" value="关闭" onclick="doclose()">
<iframe src="upload.php"  width="0" height="0" style="display:none;" name="targetframe"></iframe>

</body>
</html>