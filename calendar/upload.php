<?php
$s2 = new SaeStorage();
$name =$_FILES['myfile']['name'];

$s2->upload('test',$name,$_FILES['myfile']['tmp_name']);//把用户传到SAE的文件转存到名为test的storage

// echo $s2
// echo $s2->getUrl("test",$name);//输出文件在storage的访问路径

echo "<script type='text/javascript'>window.parent.document.getElementById('tag_img').setAttribute('src','".$s2->getUrl("test",$name)."');</script>"; 
echo '!@#%$@<br/>';
echo $s2->errmsg(); //输出storage的返回信息 
?>