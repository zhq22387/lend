<?php session_start(); ?>
<HTML>

<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>台北借物網</TITLE>
<link href="css/button.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body{
background-image:url("imgs/line4.png");
background-position:100% 0;
background-attachment:fixed;
background-repeat:repeat-y;}
-->
</style>
</HEAD>

<body>
<BODY>

</BR></BR></BR>


<p align="center">歡迎!</P>

<p align="center">會員 : 
<?php
	$Account = $_SESSION['Account'];
	echo $Account;
?>
</P>

<P align="left" style="margin-left:12px"><A HREF ="account_edit.php" TARGET="RIGHT"><img border="0" onmouseover="this.src='imgs/button_modify_user_info.png'" onmouseout="this.src='imgs/button_modify_user_info_b.png'"  width="154" height="42"></A></P>
<P align="left" style="margin-left:12px"><A HREF ="show_user_item.php" TARGET="RIGHT"><img border="0" onmouseover="this.src='imgs/button_brrow_list.png'" onmouseout="this.src='imgs/button_brrow_list_b.png'" width="154" height="42"></A></P>
<P align="left" style="margin-left:12px"><A HREF ="lend_history.php" TARGET="RIGHT"><img border="0" onmouseover="this.src='imgs/button_history.png'" onmouseout="this.src='imgs/button_history_b.png'" width="154" height="42"></A></P>
<!--<P align="center"><A HREF ="account_edit.php" TARGET="RIGHT"><img border="0" src="imgs/button_question.png" width="83" height="55"></A></P>-->
<P align="left" style="margin-left:12px"><A HREF ="search_item.php" TARGET="RIGHT"><img border="0" onmouseover="this.src='imgs/buton_search.png'" onmouseout="this.src='imgs/buton_search_b.png'" width="154" height="42"></A></P>
<P align="left" style="margin-left:12px"><A HREF ="logout.php" TARGET="_TOP"><img border="0" onmouseover="this.src='imgs/button_logout.png'" onmouseout="this.src='imgs/button_logout_b.png'" width="154" height="42"></A></P>

</BODY>

</HTML>