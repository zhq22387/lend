<?php session_start(); ?>
<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜尋</title>
<style type="text/css">
<!--
body{
background-image:url("imgs/bg3.png");
background-position:50% 50%;
background-attachment:fixed;
background-repeat:no-repeat;
background-attachment: fixed;}
-->
</style>
</head>

<body>

<h1 align="center"><font face="微軟正黑體">
<img border="0" src="imgs/title.png" width="348" height="126"></font></h1>



<!--<p align="left">歡迎!-->
<?php
	$Account = $_SESSION['Account'];
	//echo $Account;
?>
</p>
<!--
<A HREF ="account_edit.php"><input type="button" value="會員資料修改" name="account_edit"></A>
<A HREF ="logout.php">
<input type="button" value="會員登出" name="logout">
</A>
-->





<div style="position: absolute; width: 100px; height: 100px; z-index: 1" id="layer1">
	<!--<img border="0" src="imgs/list.png" width="197" height="321">-->
</div>

<!--webbot bot="SaveResults" U-File="C:\Users\RARO\Desktop\web\_private\form_results.csv" S-Format="TEXT/CSV" S-Label-Fields="TRUE" -->
<!--
<div style="position: absolute; width: 734px; height: 313px; z-index: 2; left: 227px; top: 197px" id="layer2">
	<form method="POST" action="--WEBBOT-SELF--">
		
		<p align="center"><select size="1" name="D1">
		<option>永和區</option>
		</select><select size="1" name="D2">
		<option>家電</option>
		</select><input type="text" name="T1" size="20" value="吸塵器"><input type="submit" value="送出" name="B1"></p>
	</form>
	<table border="1" width="101%">
		<tr>
			<td width="256" align="center">
			<img border="0" src="imgs/21208317743187_162_m.jpg" width="255" height="255"></td>
			<td><font face="微軟正黑體"><b>Dyson 戴森 吸塵器</b></font><p>提供者：小怪物</p>
			<p>借物地點：永和區亞美豆漿</p>
			<p>可借物時間：晚上六點以後</p>
			<p>借閱狀態：尚未借出 </p>
			<p>&nbsp;&nbsp; <font color="#FF0000">&nbsp;</font></td>
		</tr>
		<tr>
			<td width="256" align="center">
			<img src="imgs/21301228188624_522_m.jpg" alt="商品圖片"></td>
			<td><font face="微軟正黑體"><b>伊萊克斯 吸塵器</b></font><p>提供者：B9802116</p>
			<p>借物地點：永和區得和路麥當勞</p>
			<p>可借物時間：下午一點半到五點</p>
			<p>借閱狀態：<font color="#FF0000">已借出</font></p>
			<p>&nbsp;&nbsp; <font color="#FF0000">&nbsp;</font></td>
		</tr>
	</table>
</div>
-->
<p align="center">　</p>

</body>

</html>
