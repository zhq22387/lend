<?php 

session_start();
ob_start();
?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
</style>
<body>

<p align="center"><font face="微軟正黑體">
<img border="0" src="imgs/title.png" width="348" height="126"></font></p>
<p align="center"><b><font face="微軟正黑體" size="5">會員註冊</font></b></p>
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
$Account = $_POST['Account'];
$Password = $_POST['Password'];

//搜尋資料庫資料
$sql = "SELECT Account,Password FROM Account where Account = '$Account'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($Account != null && $Password != null && $row[0] == $Account && $row[1] == $Password)
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['Account'] = $Account;
		//echo '$id='.$id.' '.'$pw='.$pw.' '.'row[1]='.$row[1].'($id)   '.'$row[2]='.$row[1].'($pw)';
        echo '<p align="center">'.'登入成功!'.'</p>';
		//echo $_SESSION['Account'];
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index_fram.php>';
}
else
{
		//echo '$id='.$id.' '.'$pw='.$pw.' '.'row[1]='.$row[1].'($id)   '.'$row[2]='.$row[1].'($pw)';
        echo '<p align="center">'.'登入失敗!'.'</p>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
</body>