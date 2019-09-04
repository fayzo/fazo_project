<?php

/*
===========================================
         Notice
===========================================
# You are free to run the software as you wish
# You are free to help yourself study the source code and change to do what you wish
# You are free to help your neighbor copy and distribute the software
# You are free to help community create and distribute modified version as you wish

We promote Open Source Software by educating developers (Beginners)
 
===========================================
         For more information contact
=========================================== 
Kigali - Rwanda
Tel : (250)788802332 / (250)728802332
E-mail : info@code.rw
Website : www.code.rw

*/
session_start();
$page_access = 1;

include_once("../users/session_check.php");

include_once("../inc/dbconfig.php");

include_once("../global/make_safe.php");

$get_company = mysql_query("SELECT * FROM company");
$show_company = mysql_fetch_array($get_company);
$employee_id = mysql_real_escape_string($_SESSION['employee_id']);
$get_name = mysql_query("SELECT * FROM employees WHERE employee_id=".$_SESSION['employee_id']."");


$act_id = mysql_real_escape_string($_GET['act_id']);
$get_activity_info = mysql_query("SELECT * FROM ibikorwa_bitandukanye WHERE act_id = '$act_id' AND employee_id=".$_SESSION['employee_id']."");
$show_activity_info = mysql_fetch_array($get_activity_info);

if(isset($_POST['update'])) {

$act_id = htmlentities($_POST['act_id'], ENT_QUOTES);
$izina_rygikorwa = htmlentities($_POST['izina_rygikorwa'], ENT_QUOTES);
$uwogikorewe = htmlentities($_POST['uwogikorewe'], ENT_QUOTES);
$itariki_cyatangiye = htmlentities($_POST['itariki_cyatangiye'], ENT_QUOTES);
$ahokigeze = htmlentities($_POST['ahokigeze'], ENT_QUOTES);

$employee_id = mysql_real_escape_string($_SESSION['employee_id']);





$doSQL = "UPDATE ibikorwa_bitandukanye SET izina_rygikorwa = '$izina_rygikorwa', uwogikorewe = '$uwogikorewe', itariki_cyatangiye = '$itariki_cyatangiye', ahokigeze = '$ahokigeze', employee_id = '$employee_id' WHERE act_id = '$act_id' AND employee_id=".$_SESSION['employee_id']."";




mysql_query($doSQL) or die(mysql_error());



}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Refresh" content="<?php echo $show_company['session_timeout'] ?>;URL=../timeout.php" />

<link rel="icon" type="image/vnd.microsoft.icon" href="../favicon.ico" />
<script LANGUAGE="JavaScript">
<!--

function confirmSubmit()
{
var agree=confirm("Rebaneza ahowaba wibeshye. Urifuza gukomeza ?");
if (agree)
	return true ;
else
	return false ;
}
// -->
</script>
<title><?php include("../title.php");?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/form_assist.js"></script>

<link href="../css_codes/CalendarControl.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/CalendarControl.js"></script>

</head>
<body onload="document.getElementById('amount').focus()" onunload="window.opener.location.reload();window.close()">
<div id="smallwrap">
  <div id="header">
    <h2>KOSORA IGIKORWA GISANZWE </h2>
   
  </div>
 
     <div id="content">
  
    <form id="activity" name="activity" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
      <table class="fulltable">
        <tr>
          <td class="firstcell">Izina ryigikorwa :</td>
          <td><input name="izina_rygikorwa" type="text" class="entrytext" id="izina_rygikorwa" value="<?php echo $show_activity_info['izina_rygikorwa'] ?>"/>          </td>
        </tr>
        <tr>
          <td class="firstcell">Uwogikorewe:</td>
          <td><input name="uwogikorewe" type="text" class="entrytext" id="uwogikorewe" value="<?php echo $show_activity_info['uwogikorewe'] ?>"/></td>
        </tr>
		
        <tr>
          <td class="firstcell">Itariki cyatangiye:</td>
          <td><input name="itariki_cyatangiye" type="text" class="entrytext" id="itariki_cyatangiye" onFocus="showCalendarControl(this);" value="<?php echo $show_activity_info['itariki_cyatangiye'] ?>"/></td>
        </tr>
		<tr>
          <td class="firstcell">Aho kigeze (Hitamo) :</td>
          <td><select name="ahokigeze" class="entrytext" id="ahokigeze">
		  <option value="<?php echo $show_activity_info['ahokigeze'] ?>"><?php echo $show_activity_info['ahokigeze'] ?></option>
		   <option value="Ntikiratangira">Ntikiratangira</option>
		    <option value="Kirigukorwa">Kirigukorwa</option>
		  <option value="Cyararangiye">Cyararangiye</option>
		  
		  </select>		  </td>
        </tr>
        <tr>
          <td class="firstcell">&nbsp;</td>
          <td><input name="update" type="submit" class="button" id="update" value="BYEMEZE" onclick="return confirmSubmit()"/> <input name="act_id" type="hidden" id="act_id" value="<?php echo $show_activity_info['act_id'] ?>" /></td>
        </tr>
      </table>
    </form>
  </div>
    
  </div>
</div>
</body>
</html>
