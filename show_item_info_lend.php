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
<p align="center"><b><font face="微軟正黑體" size="5">借入</font></b></p>

<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
	include("mysql_connect.inc.php");
	//$ProvideTime=$_SESSION['ProvideTime'];
	
	$Account=$_SESSION['Account'];
	$Obj_ID=$_SESSION['Obj_ID'];
	
	date_default_timezone_set('Asia/Taipei');
	$ProvideTime = date("Y-m-d H:i:s",time());
	$year=((int)substr($ProvideTime,0,4));//取得年份
	$month=((int)substr($ProvideTime,5,2));//取得月份
	$day=((int)substr($ProvideTime,8,2));//取得几号
	$Hour=((int)substr($ProvideTime,11,2));//取得几号
	$Minute=((int)substr($ProvideTime,14,2));//取得几号
	$Second=((int)substr($ProvideTime,17,2));//取得几号
	$days =  date("Y-m-d H:i:s",mktime($Hour,$Minute,$Second,$month+1,$day,$year));
	//echo $days;
	/*
	$years = date("Y",$ProvideTime); //用date()函式取得目前年份格式0000
	$months = date("m",$ProvideTime); //用date()函式取得目前月份格式00
	$days = date("d",$ProvideTime); //用date()函式取得目前日期格式00
	$day = date("Y-m-d 00:00:00",mktime(0,0,0,$months+1,$days,$years));
	*/
	$sql = "insert into object_history (Obj_ID, Account_account, Deadline) values ('".$Obj_ID."','".$Account."','".$days."')";
	if(mysql_query($sql))
	{
		$sql_1 = "update object set ProvideTime='".$days."',Lendable='N' where ID_INC='".$Obj_ID."'";
		mysql_query($sql_1);
		//echo $Sex;
		echo '<p align="center">'.'成功借入!'.'</p>';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=show_item_info.php?ID='.$Obj_ID.'>';
		$_SESSION['Account'] = $Account;
		//echo $_SESSION['Account'];
	}
	else
	{				
		//echo $nowtime;
		//echo $Sex;
		echo '<p align="center">'.'借入失敗!'.'</p>';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=show_item_info.php?ID='.$Obj_ID.'>';
	}

?>
</body>
