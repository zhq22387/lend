<?php session_start(); ?>
<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員資料修改</title>
<style type="text/css">
<!--
body{
background-image:url("imgs/bg4.png");
background-position:50% 50%;
background-attachment:fixed;
background-repeat:no-repeat;
background-attachment: fixed;
}
-->
<!--
input{
	border:1px solid #11A5F4;
	padding:3px;
}
input:hover{
	background-color:#fcf3ef;
}
input[type="submit"]{
	background-color:#11A5F4;
}
input[type="reset"]{
	background-color:#11A5F4;
}
-->
</style>
</head>

<body>

<p align="center"><font face="微軟正黑體">
<img border="0" src="imgs/title.png" width="348" height="126"></font></p>
<p align="center"><b><font face="微軟正黑體" size="5">會員資料修改</font></b></p>


<?php
	include("mysql_connect.inc.php");
	$Account = $_SESSION['Account'];
	
	$result = mysql_query("SELECT Account,Password,Name,Sex,Email,PhoneNumber FROM account WHERE Account='".$Account."'");	//(有用)	
	$row = @mysql_fetch_row($result);
	
	$Account = $row[0];
	$Password = $row[1];
	$Name = $row[2];
	$Sex = $row[3];
	$Email = $row[4];
	$PhoneNumber = $row[5];
	
	/*
	date_default_timezone_set('Asia/Taipei');
	$CreateTime = date("Y-m-d H:i:s",time());
	*/
?>
	<!--webbot bot="SaveResults" U-File="C:\Users\RARO\Desktop\web\_private\form_results.csv" S-Format="TEXT/CSV" S-Label-Fields="TRUE" -->
	<form method="POST" action="account_edit_finish.php">
	<p align="center">密碼：<input type="password" name = "Password" value = <?php echo $Password;?>  size="20"></p>
	<p align="center">姓名：<input type="text" name = "Name" value = <?php echo $Name;?> size="20"></p>
	<p align="center">
	性別：
	男<input type="radio" value="男" <?php if($Sex=='男')echo 'checked';else echo 'checked';?> name="Sex">
	女<input type="radio" value="女" <?php if($Sex=='男')echo 'checked';else echo 'checked';?> name="Sex" ></p>
	<p align="center">電話：<input type="text" name = "PhoneNumber" value = <?php echo $PhoneNumber;?> size="20"></p>
	<p align="center">Email：<input type="text" name = "Email" value = <?php echo $Email;?> size="20"></p>
	<p align="center"><A HREF ="member.php"><input type="submit" value="送出" name="send"></A><input type="reset" value="重新設定" name="reset"></p>
	</form>
<p align="center">　</p>

</body>

</html>
