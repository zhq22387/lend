<?  
  $link_ID = mysql_connect("localhost","test2","0000");
mysql_query('SET NAMES utf8',$link_ID);
mysql_query('SET CHARACTER_SET_CLIENT=utf8',$link_ID);
mysql_query('SET CHARACTER_SET_RESULTS=utf8',$link_ID);
mysql_select_db("db_elender");

mysql_query("UPDATE `object` SET `Delete` =  'Y' where ID_INC='$_GET[ID]'");

?>
<style type="text/css">
<!--
body{
background-image:url("imgs/hand2.gif");
background-position:50% 50%;
background-attachment:fixed;
background-repeat:no-repeat;}
-->
</style>
<body bgcolor="#E6EFFF" background="332.jpg">
<p style="margin-top: 0; margin-bottom: 0" align="center">
<img border="0" src="data_show.png" width="233" height="93"></p>
<hr style="background-color: #FFFF00" color="#FFFFFF">
<script>document.location.href="show_user_item.php?user_name=Dot";</script>
</body>