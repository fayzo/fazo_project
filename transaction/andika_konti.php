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

$izina_bank = htmlentities($_POST['izina_bank'], ENT_QUOTES);

$nimero_konti = htmlentities($_POST['nimero_konti'], ENT_QUOTES);
$amafaranga_ariho = htmlentities($_POST['amafaranga_ariho'], ENT_QUOTES);



$employee_id = mysql_real_escape_string($_SESSION['employee_id']);



$doSQL = "INSERT INTO kwizigamira (izina_bank, nimero_konti, amafaranga_ariho,employee_id) VALUES ('$izina_bank', '$nimero_konti', '$amafaranga_ariho','$employee_id')";

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
    <h2>KWANDIKA KONTI YA BANK</h2>
  
  </div>
  <div id="content">
    <form id="andika_konti" name="andika_konti" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td width="25%" class="firstcell">Izina rya bank:</td>
          <td width="75%"><input name="izina_bank" type="text" class="entrytext" id="izina_bank" /></td>
        </tr>
        <tr>
          <td class="firstcell">nomero ya konti :</td>
          <td><input name="nimero_konti" type="text" class="entrytext" id="nimero_konti" /></td>
        </tr>
        <tr>
          <td class="firstcell">amafaranga ariho:</td>
          <td><input name="amafaranga_ariho" type="text" class="entrytext" id="amafaranga_ariho" size="25"/></td>
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
