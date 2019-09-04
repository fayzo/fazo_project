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



if(isset($_POST['create'])) {

$uwangurije = htmlentities($_POST['uwangurije'], ENT_QUOTES);

$yangurije = htmlentities($_POST['yangurije'], ENT_QUOTES);
$yangurije_tariki = htmlentities($_POST['yangurije_tariki'], ENT_QUOTES);
$ntakurenza = htmlentities($_POST['ntakurenza'], ENT_QUOTES);

$hishyuwe = '0';
$asigaye = htmlentities($_POST['yangurije'], ENT_QUOTES);


$employee_id = mysql_real_escape_string($_SESSION['employee_id']);


$doSQL = "INSERT INTO inguzanyo (uwangurije, yangurije, yangurije_tariki, hishyuwe, asigaye, ntakurenza, employee_id) VALUES ('$uwangurije', '$yangurije', '$yangurije_tariki',  '$hishyuwe', '$asigaye', '$ntakurenza','$employee_id')";

mysql_query($doSQL) or die(mysql_error());

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Refresh" content="<?php echo $show_company['session_timeout'] ?>;URL=../timeout.php" />

<link rel="icon" type="image/vnd.microsoft.icon" href="../favicon.ico" />
<link href="../css_codes/CalendarControl.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/CalendarControl.js"></script>

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
</head>
<body onload="document.getElementById('name').focus()" onunload="window.opener.location.reload();window.close()">
<div id="smallwrap">
  <div id="header">
    <h2>KWANDIKA INGUZANYO </h2>
  
  </div>
  <div id="content">
    <form id="andika_inguzanyo" name="andika_inguzanyo" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td width="49%" class="firstcell">Uwangurije  :</td>
          <td width="51%"><input name="uwangurije" type="text" class="entrytext" id="uwangurije" /></td>
        </tr>
        <tr>
          <td class="firstcell">Amafaranga yangurije :</td>
          <td><input name="yangurije" type="text" class="entrytext" id="yangurije" /></td>
        </tr>
		<tr>
          <td class="firstcell">Tariki nagurijweho:</td>
          <td><input name="yangurije_tariki" type="text" class="entrytext" id="yangurije_tariki" size="25" value="" onFocus="showCalendarControl(this);"/></td>
        </tr>
		<tr>
          <td class="firstcell">Tariki ntarengwa yokwishyura:</td>
          <td><input name="ntakurenza" type="text" class="entrytext" id="ntakurenza" size="25" value="" onFocus="showCalendarControl(this);"/></td>
        </tr>
        <tr>
          <td class="firstcell">&nbsp;</td>
          <td><input name="create" type="submit" class="button" id="create" value="BYEMEZE" onclick="return confirmSubmit()"/></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
