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

$id = mysql_real_escape_string($_GET['id']);
$get_kwishyurwa = mysql_query("SELECT * FROM abonagurije WHERE id = '$id' AND employee_id=".$_SESSION['employee_id']."");
$show_kwishyurwa = mysql_fetch_array($get_kwishyurwa);






if(isset($_POST['update'])) {


$ide_id = htmlentities($_POST['ide_id'], ENT_QUOTES);
$hishyuwe = htmlentities($_POST['hishyuwe'], ENT_QUOTES);
$itariki_yishyuwe = htmlentities($_POST['itariki_yishyuwe'], ENT_QUOTES);


$employee_id = mysql_real_escape_string($_SESSION['employee_id']);

$doSQL = "UPDATE abonagurije SET hishyuwe=hishyuwe+'$hishyuwe', asigaye=asigaye-'$hishyuwe' WHERE id='$ide_id' AND employee_id=".$_SESSION['employee_id']."";

mysql_query($doSQL) or die(mysql_error());

$doSQL2 = "INSERT INTO kwishyura_ideni (ide_id, hishyuwe,  itariki_yishyuwe, employee_id) VALUES ('$ide_id', '$hishyuwe', '$itariki_yishyuwe', '$employee_id')";

mysql_query($doSQL2) or die(mysql_error());

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
<body onload="document.getElementById('name').focus()" onunload="window.opener.location.reload();window.close()">
<div id="smallwrap">
  <div id="header">
    <h2>ANDIKA AMAFARANGA WISHYUWE</h2>
   
  </div>
  <div id="content">
    <form id="kwishyura" name="kwishyura" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
	  <tr>
          <td width="40%" class="firstcell"><font  color="#000000">Izina Ryuwonagurije </font></td>
          <td width="60%" colspan="2"><font size="+1" color="#000000">: <?php echo $show_kwishyurwa['uwonagurije'] ?></font><br /></td></tr>
	  
	  
            <td class="firstcell"><font color="#000000">Amafaranga andimo </font></td>
              <td colspan="2"><font size="+1" color="#000000">: <?php echo number_format($show_kwishyurwa['asigaye'], 0) ?> </font><br /></td>
        </tr>
       
        <tr>
          <td class="firstcell">Amafaranga Anyishyuye </td>
          <td colspan="2">: 
            <input name="hishyuwe" type="text" class="entrytext" id="hishyuwe"  /></td>
        </tr>
        
        <tr>
          <td class="firstcell">Itariki anyishyuye </td>
          <td>: 
            <input name="itariki_yishyuwe" type="text" class="entrytext" id="itariki_yishyuwe" size="15"  onFocus="showCalendarControl(this);"/></td>
        </tr>
        <tr>
          <td class="firstcell">&nbsp;</td>
          <td colspan="2"><input name="update" type="submit" class="button" id="update" value="BYEMEZE" onclick="return confirmSubmit()"/>
          <input name="ide_id" type="hidden" id="ide_id" value="<?php echo $show_kwishyurwa['id'] ?>" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
