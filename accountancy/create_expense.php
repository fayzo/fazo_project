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

$get_expense_categories = mysql_query("SELECT * FROM expense_categories WHERE employee_id=".$_SESSION['employee_id']."");


if(isset($_POST['create'])) {

$category_id = htmlentities($_POST['category_id'], ENT_QUOTES);

$reason = htmlentities($_POST['reason'], ENT_QUOTES);
$amount = htmlentities($_POST['amount'], ENT_QUOTES);

$date_received = htmlentities($_POST['date_received'], ENT_QUOTES);

$employee_id = mysql_real_escape_string($_SESSION['employee_id']);



$doSQL = "INSERT INTO expenses (category_id, reason,  amount,  date_received, employee_id) VALUES ('$category_id', '$reason', '$amount', '$date_received' , '$employee_id')";

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
<title><?php include("../title.php");?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/form_assist.js"></script>
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
</head>
<body onload="document.getElementById('amount').focus()" onunload="window.opener.location.reload()">
<div id="smallwrap">
  <div id="header">
    <h2>andika uko amafaranga yasohotse </h2>
  
  </div>
  <div id="content">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="ayasohotse" id="ayasohotse">
      <table class="fulltable">
        <tr>
          <td class="firstcell">Icyiciro (Hitamo icyiciro):</td>
          <td><select name="category_id" class="entrytext" id="category_id">
            <?php while($show_expense_category = mysql_fetch_array($get_expense_categories)) { ?>
            <option value="<?php echo $show_expense_category['name'] ?>"><?php echo $show_expense_category['name'] ?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td class="firstcell">Impamvu asohotse :</td>
          <td><input name="reason" type="text" class="entrytext" id="reason" /></td>
        </tr>
        <tr>
          <td class="firstcell">Umubare w' amafaranga  :</td>
          <td><input name="amount" type="text" class="entrytext" id="amount" /></td>
        </tr>
        <tr>
          <td class="firstcell">Itariki asohotseho :</td>
          <td><input name="date_received" type="text" class="entrytext" id="date_received" value="<?php echo date('Y-m-d') ?>" onFocus="showCalendarControl(this);"/></td>
        </tr>
        <tr>
          <td class="firstcell">&nbsp;</td>
          <td><input name="create" type="submit" class="button" id="create" value="YANDIKE" onclick="return confirmSubmit()"/>
          <input name="close" type="button" class="button" id="close" onclick="window.close()" value="FUNGA" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
