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
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>編輯物品</title>
  <meta name="description" content="互相借閱平台" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.min72.js"></script>
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <script type="text/javascript" src="js/jquery-ui-slide.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
  <script type="text/javascript">
$(function(){
	$('#example_3').datetimepicker({
	    timeFormat: 'hh:mm:ss'
    });
});
</script>
<style type="text/css">
ol,ul{list-style:none}
body{height:100%; font:12px/18px Tahoma; }
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px;}
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
.ui_tpicker_hour_label,.ui_tpicker_minute_label,.ui_tpicker_second_label,.ui_tpicker_millisec_label,.ui_tpicker_time_label{padding-left:20px}
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

<?php
if(count($_POST)>0){
    /* MODIFY: 1. 更改以下IP */
   
    if($_POST[submit]=="儲存"){
        $error_code = 0;
        $error_msg = array(
            1 => "檔案上傳失敗，請檢查檔案是否已損毀",
            2 => "檔案格式錯誤（必須為圖片檔）或檔案太大（必須為 5 Mb 以下）",
            3 => "姓名欄位未填或長度不符",
            4 => "未填寫聯絡電話或長度不符",
            5 => "未填寫 Email 或格式不正確",
            6 => "未選擇上傳圖片"
        );
        
        /*if (strlen($_POST[name]) < 2)
        {
            $error_code = 3;
        }
        else if (strlen($_POST[phoneNum]) < 6 || strlen($_POST[phoneNum]) > 15)
        {
            $error_code = 4;
        }
        else if (strlen($_POST[email]) < 3 || strpos($_POST[email], '@') == false)
        {
            $error_code = 5;
        }
        elseif (strlen($_FILES["file"]["name"]) == 0)
        {
            $error_code = 6;
        }
        
        if ($error_code == 0)
        {
            $allowedExts = array("jpg", "jpeg", "gif", "png");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg"))
            && ($_FILES["file"]["size"] < 5000000))
            {
                if ($_FILES["file"]["error"] > 0)
                {
                    $error_code = 1;
                }
                else
                {
                    $fp = fopen("upload/num.txt","r");
                    $getnum = fgets($fp, 1024);
                    fclose($fp);
                    $getnum = $getnum + 1;
                    $fp = fopen("upload/num.txt","w");
                    fputs($fp, $getnum);
                    fclose($fp);
                    
                    $upload_filename = "upload/order_" . sprintf("%1$06d", $getnum) . "." . $extension;
                    move_uploaded_file($_FILES["file"]["tmp_name"], $upload_filename);
                }
            }
            else
            {
                $error_code = 2;
            }
        }
      */
        if ($error_code != 0)
        {
            echo "<script>alert(\"$error_msg[$error_code]\");window.history.back();</script>";
            exit;
        }else{
			$link_ID = mysql_connect("localhost","test2","0000");
			mysql_query('SET NAMES utf8',$link_ID);
			mysql_query('SET CHARACTER_SET_CLIENT=utf8',$link_ID);
			mysql_query('SET CHARACTER_SET_RESULTS=utf8',$link_ID);

			mysql_select_db("db_elender");
			$str = "UPDATE `object` SET 
			`Name` = '".$_POST['object_name']."',
			`State` = '".$_POST['object_state']."' ,
			`ProvideTime` = '".$_POST['provide_time']."' ,
			`Region` = '".$_POST['obecjt_area']."',
			`Address` = '". $_POST['object_address'] ."',
			`LendLimit` = '". $_POST['object_limit'] ."' ,
			`CreateTime` = NOW()
			 where ID_INC='$_GET[ID]'";
			mysql_query($str);
			//echo $_POST['support_time1']." ".$_POST['support_time2'];
			echo "<script>alert(\"儲存成功\");</script>";
			echo "<script>document.location.href=\"show_user_item.php?user_name=Dot\";</script>";
		}
    }
}
?>

<div align="center" style="margin-top:126px">
<table border="0" width="400"><tr><td>

<form action="" method="post" enctype="multipart/form-data" name="form1">
物品名稱：<input name="object_name" type="text" value="<?php echo $row['Name']; ?>" size="40"><br>
物品描述：<input name="object_state" type="text" value="<?php echo $row['State']; ?>" size="40"><br>
可提供的時間：<input type="text" id="example_3" value="<?php echo $row['ProvideTime']; ?>" name="provide_time"/><br/>
<!--input name="provide_time" type="text" value="" size="40" id="dt1"><a href="javascript:NewCal('dt1','MMDDYYYY',true,24)"><img src="imgs/cal.gif" width="16" height="16"></a-->
所在區域：<select size="1" name="obecjt_area">
<option <?php if($row['Region']=='中正區')echo 'selected'; ?>>中正區</option>
<option <?php if($row['Region']=='大同區')echo 'selected'; ?>>大同區</option>
<option <?php if($row['Region']=='中山區')echo 'selected'; ?>>中山區</option>
<option <?php if($row['Region']=='松山區')echo 'selected'; ?>>松山區</option>
<option <?php if($row['Region']=='萬華區')echo 'selected'; ?>>萬華區</option>
<option <?php if($row['Region']=='信義區')echo 'selected'; ?>>信義區</option>
<option <?php if($row['Region']=='士林區')echo 'selected'; ?>>士林區</option>
<option <?php if($row['Region']=='北投區')echo 'selected'; ?>>北投區</option>
<option <?php if($row['Region']=='內湖區')echo 'selected'; ?>>內湖區</option>
<option <?php if($row['Region']=='南港區')echo 'selected'; ?>>南港區</option>
<option <?php if($row['Region']=='文山區')echo 'selected'; ?>>文山區</option>
<option <?php if($row['Region']=='大安區')echo 'selected'; ?>>大安區</option>
</select><br>
詳細地址：<input name="object_address" type="text" value="<?php echo $row['Address']; ?>" size="40"><br>
借物限制：<input name="object_limit" type="text" value="<?php echo $row['LendLimit']; ?>" size="40"><br>
物品照片：<br><img src="<?php echo $row['PhotoPath']; ?>" width="200" height="200">
<!--input name="file" type="file" value="" size="40"--><br>
<br>
<input name="items" type="hidden" value="<?php echo $items; ?>">
<div align="center">
<input name="submit" type="submit" value="儲存" style="">
</div>
</form>
</td>
</tr>
</table>
</div>
</body>
</html>