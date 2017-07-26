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
	$result=mysql_query("select * from `object` where `ID_INC` = '".$_GET['ID']."'");
	$row = mysql_fetch_array($result);
?>

<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>物品資料</title>
<script src="js/jquery.min.js" type="text/javascript"> </script> 
<style type="text/css">
<!--
body{
background-image:url("imgs/bg4.png");
background-position:50% 50%;
background-attachment:fixed;
background-repeat:no-repeat;}
-->
<!--
TEXTAREA,select{
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
<?php 
	if($row[Lendable]=='Y')
			$lendable = "尚未借出";
		else
			$lendable = "已借出";
			
	echo "<table border=\"2\" bordercolor=#0066aa>";
	echo "<tr>
			<td align=\"center\" colspan=\"2\"><font face=\"微軟正黑體\"><b>". $row['Name'] ."</b></font></td>
		</tr>
		<tr>
			<td width=\"256\" align=\"center\">
			<img border=\"0\" src=\"". $row['PhotoPath'] ."\" width=\"255\" height=\"255\"></td>
			<td>編號：". $row['ID_INC'] ."<p>提供者：". $row['Account_account'] ."</p>
			<p>借物地點：". $row['Region']."" .$row['Address'] ."</p>
			<p>可借物時間：". $row['ProvideTime'] ."</p>
			<p>創建時間：". $row['CreateTime'] ."</p>
			<p>借閱狀態：". $lendable ."</p>
			<p>借閱限制：". $row['LendLimit'] ."</p>";			
?>
		
			<?php
			$_SESSION['ProvideTime'] = $row['ProvideTime'];
			$_SESSION['Account'] = $Account;
			$_SESSION['Obj_ID'] = $_GET['ID'];	
			$_SESSION['Account_account'] = $row['Account_account'];	
			
			/*
			function LendFunction()
			{
				$years = date("Y",$row['ProvideTime']); //用date()函式取得目前年份格式0000
				$months = date("m",$row['ProvideTime']); //用date()函式取得目前月份格式00
				$days = date("d",$row['ProvideTime']); //用date()函式取得目前日期格式00
				$day = date("Y-m-d",mktime(0,0,0,$months,$days+30,$years));
				//echo $day;
				$sql = "insert into object_history (Obj_ID, Account_account, Deadline) values ('".$_GET['ID']."','".$Account."','".$day."')";
				mysql_query($sql);
			}
			*/
			?>
			<!--<input type="button" name="call_function" value="我要借" onclick="<?php //LendFunction() ?>"/>-->
			<?//echo $Account;?>
			
			<?php
			if($row[Lendable]=='Y')
			echo '<A HREF ="show_item_info_lend.php"><img border="0" src="imgs/button.png" width="100" height="42"></A>';
			?>
			<?php			
			$sql_wholend = "SELECT Account_account FROM object_history where Deadline='".$row['ProvideTime']."' AND Obj_ID ='".$row['ID_INC']."'";
			$result = mysql_query($sql_wholend);
			$once="Y";
			while($row = mysql_fetch_row($result))
			{
				if($Account == $row[0] && $once=="Y")
				{
					$once="N";
					echo '<A HREF ="show_item_info_Return.php"><img border=\"0\" src=imgs/button_return.png width=\"100\" height=\"42\"></A>';
				}
			}
			
			
			?>
			
			
<?php
	echo	"	
			</td>
		</tr>
		<tr>
			<td align=\"center\" colspan=\"2\">". $row['State'] ."</td>
		</tr>";
	echo "</table>";
?>
<form method="POST" action="message_text_finish.php">
	<p align="center">留言</p>
	<p align="center"><TEXTAREA NAME="Text" ROWS=5 COLS=30></TEXTAREA></p>
	<p align="center"><input type="submit" value="送出" name="send"><input type="reset" value="清空" name="reset"></p>
</form>
<?php
	$sql = "SELECT * FROM message where Obj_ID = '".$_GET['ID']."' ORDER BY CreateTime";
	$result = mysql_query($sql);
	$total_records=mysql_num_rows($result);  // 取得記錄數
	if($total_records>0){
		echo "<table border=\"2\" width=\"50%\" bordercolor=#0066aa sytle=\"vertical-align:middle;\">";
		while($row = mysql_fetch_row($result))
		{
			if($row[2]=="")
			{
				echo "<tr>
			<td width=\"101\" align=\"left\">";
				echo "[ ".$row[4]." ]回答:".'<p align="right">'.$row[3]."</p>";
				echo "</td></tr>";
			}
			else
			{
				echo "
			<td width=\"101\" align=\"left\">";
				echo "[ ".$row[4]." ]提問:".'<p align="right">'.$row[3]."</p>";
				echo "</td></tr>";
			}
		}
		echo "</table>";
	}
?>

</div>
</body>

</html>