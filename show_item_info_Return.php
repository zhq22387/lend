<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
body{
background-image:url("imgs/bg4.png");
background-position:50% 50%;
background-attachment:fixed;
background-repeat:no-repeat;}
-->
</style>
<body>

<p align="center"><font face="微軟正黑體">
<img border="0" src="imgs/title.png" width="348" height="126"></font></p>
<p align="center"><b><font face="微軟正黑體" size="5">歸還</font></b></p>

<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它

include("mysql_connect.inc.php");
	/*
	Account
	Password
	Name
	Male
	Female
	PhoneNumber
	Email
	*/
	
	$Account=$_SESSION['Account'];
	$Obj_ID=$_SESSION['Obj_ID'];
	date_default_timezone_set('Asia/Taipei');
	$CreateTime = date("Y-m-d H:i:s",time());
	
	//$CreateTime = date(‘Y-m-d H:i:s’,now());
	//判斷帳號密碼是否為空值
	//確認密碼輸入的正確性
	
	//新增資料進資料庫語法
	$sql = "update object set ProvideTime='".$CreateTime."',Lendable = 'Y' where ID_INC='".$Obj_ID."'";
	if(mysql_query($sql))
	{
			//echo $Sex;
			echo '<p align="center">'.'成功歸還!'.'</p>';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=show_item_info.php?ID='.$Obj_ID.'>';
			
			//echo $_SESSION['Account'];
	}
	else
	{				
			//echo $nowtime;
			//echo $Sex;
			echo '<p align="center">'.'歸還失敗!'.'</p>';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=show_item_info.php?ID='.$Obj_ID.'>';
	}
	$_SESSION['Account'] = $Account;

?>
</body>
