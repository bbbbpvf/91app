<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>�û���¼</title>
<style type="text/css">
    html{font-size:12px;}
    fieldset{width:520px; margin: 0 auto;}
    legend{font-weight:bold; font-size:14px;}
    label{float:left; width:70px; margin-left:10px;}
    .left{margin-left:80px;}
    .input{width:150px;}
    span{color: #666666;}
</style>
<script language=JavaScript>
<!--

function InputCheck(RegForm)
{
  if (RegForm.username.value == "")
  {
    alert("�û�������Ϊ��!");
    RegForm.username.focus();
    return (false);
  }
  if (RegForm.password.value == "")
  {
    alert("�����趨��¼����!");
    RegForm.password.focus();
    return (false);
  }
  if (RegForm.repass.value != RegForm.password.value)
  {
    alert("�������벻һ��!");
    RegForm.repass.focus();
    return (false);
  }
  if (RegForm.email.value == "")
  {
    alert("�������䲻��Ϊ��!");
    RegForm.email.focus();
    return (false);
  }
}

//-->
</script>
</head>
<body>
<div>
<fieldset>
<legend>����app</legend>
<form name="RegForm" method="post" action="reg.php" onSubmit="return InputCheck(this)">
<p>
<label for="username" class="label">�û���:</label>
<input id="username" name="username" type="text" class="input" />
<span>(���3-15�ַ����ȣ�֧�ֺ��֡���ĸ�����ּ�_)</span>
<p/>
<p>
<label for="password" class="label">�� ��:</label>
<input id="password" name="password" type="password" class="input" />
<span>(�����������6λ)</span>
<p/>
<p>
<label for="repass" class="label">�ظ�����:</label>
<input id="repass" name="repass" type="password" class="input" />
<p/>
<p>
<label for="email" class="label">��������:</label>
<input id="email" name="email" type="text" class="input" />
<span>(����)</span>
<p/>
<p>
<input type="submit" name="submit" value="  �ύע��  " class="left" />
</p>
</form>
</fieldset>
</div>
</body>
</html>