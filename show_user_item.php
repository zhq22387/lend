<?php session_start(); ?>
<?php
	$Account = $_SESSION['Account'];
	//echo $Account;
?>
<?
	$link_ID = mysql_connect("localhost","test2","0000");
	mysql_query('SET NAMES utf8',$link_ID);
	mysql_query('SET CHARACTER_SET_CLIENT=utf8',$link_ID);
	mysql_query('SET CHARACTER_SET_RESULTS=utf8',$link_ID);
	mysql_select_db("db_elender");
	/* 查詢資料 */

	$result=mysql_query("select * from `object` where `Account_account` = '".$Account."' AND `Delete`='N'");
	
	$total_fields=mysql_num_fields($result); // 取得欄位數

	$total_records=mysql_num_rows($result);  // 取得記錄數
	//echo $total_records;
?>


<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>物品清單</title>
<script src="js/jquery.min.js" type="text/javascript"> </script> 
<style type="text/css">
<!--
body{
background-image:url("imgs/bg4.png");
background-position:50% 50%;
background-attachment:fixed;
background-repeat:no-repeat;}
-->
</style>
</head>
<body>

<P align="center"><A HREF ="add_item.php" TARGET="RIGHT"><img border="0" src="imgs/button_add_object.png" width="100" height="42"></A></P>

<div align="center">
<?php 
//echo "Account =". $Account;
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
			<p align=\"right\"><a href=\"edit_item.php?ID=". $row[ID_INC] ."\"><img border=\"0\" src=\"imgs/button_edit_object.png\" width=\"100\" height=\"42\"></a>";
		
		if($row[Lendable]=='Y')
			echo "<a href=\"set_item_delete.php?ID=". $row[ID_INC] ."\"><img border=\"0\" src=\"imgs/button_delete_object.png\" width=\"100\" height=\"42\"></a></p></td>";
		
		echo "</tr>";
	}
	echo "</table>";
	mysql_free_result($result);
}else
	echo "查無資料";
?>
</div>
</body>

</html>