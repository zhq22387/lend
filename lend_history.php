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
	$result = mysql_query("SELECT a.Obj_ID, a.Account_account, a.Deadline, b.Name,  b.PhotoPath, b.Region, b.Address, b.Lendable FROM object_history AS a, object AS b WHERE a.Obj_ID = b.ID_INC AND a.Account_account = '".$Account."' ORDER BY a.Deadline");

	//$result=mysql_query("select * from `object` where `Region` = '".$_POST['obecjt_area']."' AND `Name` like '%".$_POST['object_name']."%'");
	$total_fields=mysql_num_fields($result); // 取得欄位數
	$total_records=mysql_num_rows($result);  // 取得記錄數
	//echo $total_records;

?>


<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>物品借出歷史</title>
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
<div align="center">

<?php
if($total_records>0){
	echo "<table border=\"2\" width=\"90%\" bordercolor=#0066aa sytle=\"vertical-align:middle;\">";
	for ($i=0;$i<$total_records;$i++) 
	{
		$row = mysql_fetch_array($result);			
		echo 
		"<tr>
			<td width=\"201\" align=\"center\">
			<a href=\"show_item_info.php?ID=".$row[Obj_ID]."\"><img border=\"0\" src=\"". $row[PhotoPath] ."\" width=\"200\" height=\"200\"></a></td>
			<td><a href=\"show_item_info.php?ID=".$row[Obj_ID]."\" STYLE=\"text-decoration:none\"><font face=\"微軟正黑體\"><b>". $row[Name] ."</b></font></a><p></p>
			<p>借物期限：". $row[Deadline] ."</p>	
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