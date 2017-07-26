<?php session_start(); ?>
<?php
	$Account = $_SESSION['Account'];
	$_SESSION['Account'] = $Account;
	//echo $Account;
?>
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
<p align="center"><b><font face="微軟正黑體" size="5">留言</font></b></p>

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
	//$COMMENT = $_POST['COMMENT'];
	$Obj_ID=$_SESSION['Obj_ID'];
	$Text = $_POST['Text'];
	
	$Account_account = $_SESSION['Account_account'];	
	$Account = $_SESSION['Account'];
	
	date_default_timezone_set('Asia/Taipei');
	$CreateTime = date("Y-m-d H:i:s",time());
	
	//$CreateTime = date(‘Y-m-d H:i:s’,now());
	//判斷帳號密碼是否為空值
	//確認密碼輸入的正確性
	

        //新增資料進資料庫語法
		if($Account==$Account_account)
		{		
			$sql = "insert into  message (Obj_ID,Account_account,Text,CreateTime) values ('".$Obj_ID."','','".$Text."','".$CreateTime."')";
		}
		else
		{			
			$sql = "insert into  message (Obj_ID,Account_account,Text,CreateTime) values ('".$Obj_ID."','".$Account."','".$Text."','".$CreateTime."')";
		}
        if(mysql_query($sql))
        {
				//echo $Sex;
                echo '<p align="center">'.'留言成功!'.'</p>';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=show_item_info.php?ID='.$Obj_ID.'>';
				$_SESSION['Account'] = $Account;
				//echo $_SESSION['Account'];
        }
        else
        {				
				//echo $nowtime;
				//echo $Sex;
                echo '<p align="center">'.'留言失敗!'.'</p>';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=show_item_info.php?ID='.$Obj_ID.'>';
        }
?>
</body>
