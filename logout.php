<?php 
session_start();

?>
<style type="text/css">
<!--
body{
background-image:url("imgs/bg4.png");
background-position:50% 50%;
background-attachment:fixed;
background-repeat:no-repeat;}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<body>

<p align="center"><font face="微軟正黑體">
<img border="0" src="imgs/title.png" width="348" height="126"></font></p>
<p align="center"><b><font face="微軟正黑體" size="5">登出</font></b></p>

<?php
//將session清空
unset($_SESSION['Account']);
echo '<p align="center">'.'登出中......'.'</p>';
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>
</body>