<?php session_start(); ?>
<?php
	$Account = $_SESSION['Account'];
	$_SESSION['Account'] = $Account;
	//echo $Account;
?>
<?
  $link_ID = mysql_connect("localhost","test2","0000");
mysql_query('SET NAMES utf8',$link_ID);
mysql_query('SET CHARACTER_SET_CLIENT=utf8',$link_ID);
mysql_query('SET CHARACTER_SET_RESULTS=utf8',$link_ID);
mysql_select_db("db_elender");
/* 查詢資料 */
if($_POST['obecjt_area'] == '無')
$result=mysql_query("select * from `object` where `Name` like '%".$_POST['object_name']."%' AND `Delete`='N'");
else
$result=mysql_query("select * from `object` where `Region` = '".$_POST['obecjt_area']."' AND `Name` like '%".$_POST['object_name']."%' AND `Delete`='N'");

//$result=mysql_query("select * from `object` where `Region` = '".$_POST['obecjt_area']."' AND `Name` like '%".$_POST['object_name']."%'");

$total_fields=mysql_num_fields($result); // 取得欄位數

$total_records=mysql_num_rows($result);  // 取得記錄數
//echo $total_records;

?>


<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>物品搜尋</title>
<style type="text/css">
<!--
body{
background-image:url("imgs/bg4.png");
background-position:50% 50%;
background-attachment:fixed;
background-repeat:no-repeat;}
-->
<!--
input,select{
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
<div align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1">
<p align="center"><select size="1" name="obecjt_area">
<option selected>無</option>
<option>中正區</option>
<option>大同區</option>
<option>中山區</option>
<option>松山區</option>
<option>萬華區</option>
<option>信義區</option>
<option>士林區</option>
<option>北投區</option>
<option>內湖區</option>
<option>南港區</option>
<option>文山區</option>
<option>大安區</option>
</select><input name="object_name" type="text" value="" size="40"><input type="submit" value="送出" name="B1"></p>
	</form>

<?php 
if($total_records>0){
	echo "<table border=\"2\" width=\"90%\" bordercolor=#0066aa sytle=\"vertical-align:middle;\">";
	for ($i=0;$i<$total_records;$i++) {
	
		$row = mysql_fetch_array($result);
		
		if($row[Lendable]=='Y')
			$lendable = "尚未借出";
		else
			$lendable = "已借出";
			
		echo "<tr>
			<td width=\"201\" align=\"center\">
			<a href=\"show_item_info.php?ID=".$row[ID_INC]."\"><img border=\"0\" src=\"". $row[PhotoPath] ."\" width=\"200\" height=\"200\"></a></td>
			<td><a href=\"show_item_info.php?ID=".$row[ID_INC]."\" STYLE=\"text-decoration:none\"><font face=\"微軟正黑體\"><b>". $row[Name] ."</b></font></a><p>提供者：". $row[Account_account] ."</p>
			<p>借物地點：". $row[Region] . " " . $row[Address] ."</p>
			<p>可借物時間：". $row[ProvideTime] ."</p>
			<p>借閱狀態：". $lendable ." </p>
			</td>
		</tr>";
	}
	echo "</table>";
	mysql_free_result($result);
}else
	echo "查無資料";
?>
</div>


<p>　</p>
<p align="center">　</p>




</body>

</html>