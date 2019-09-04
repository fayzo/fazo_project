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


$get_employees = mysql_query("SELECT * FROM employees WHERE  employee_id=".$_SESSION['employee_id']."");
$show_employee = mysql_fetch_array($get_employees);



$akazi_kose_id = mysql_real_escape_string($_GET['akazi_kose_id']);
$get_akazi = mysql_query("SELECT * FROM akazi_kose WHERE akazi_kose_id = '$akazi_kose_id' AND employee_id=".$_SESSION['employee_id']."");
$show_akazi = mysql_fetch_array($get_akazi);



$employee_id = mysql_real_escape_string($_SESSION['employee_id']);


if(isset($_POST['update'])) {



$akazi_kose_id = htmlentities($_POST['akazi_kose_id'], ENT_QUOTES);
$ahokageze = htmlentities($_POST['ahokageze'], ENT_QUOTES);

$employee_id =mysql_real_escape_string( $_SESSION['employee_id']);




$doSQL = "UPDATE akazi_kose SET ahokageze ='$ahokageze' WHERE akazi_kose_id = '$akazi_kose_id' AND employee_id=".$_SESSION['employee_id']." ";

mysql_query($doSQL) or die(mysql_error());



}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Refresh" content="<?php echo $show_company['session_timeout'] ?>;URL=../timeout.php" />



<link rel="icon" type="image/vnd.microsoft.icon" href="../favicon.ico" />

<title><?php include("../title.php");?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/form_assist.js"></script>
<link href="../css_codes/CalendarControl.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/CalendarControl.js"></script>
</head>
<body onload="document.getElementById('name').focus()" onunload="window.opener.location.reload();window.close()">
<div id="smallwrap">
  <div id="header">
    <h2>UMWANZURO W' AKAZI </h2>
   
  </div>
  <div id="content">
    <form id="umwanzuro" name="umwanzuro" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
	  <tr>
          <td class="firstcell">Aho kageze gakorwa :</td>
          <td><select name="ahokageze" class="entrytext" id="ahokageze">
                 <option value="<?php echo $show_akazi['ahokageze'] ?>"><?php echo $show_akazi['ahokageze'] ?></option>
                  <option value="Ntikarikakorwa">Ntikarikakorwa</option>
                  
                  <option value="Karangiye">Karangiye</option>
            </select></td>
        </tr>
        <tr>
          <td class="firstcell">&nbsp;</td>
          <td><input name="update" type="submit" class="button" id="update" value="BYEMEZE" onclick="return confirmSubmit()"/>
          <input name="akazi_kose_id" type="hidden" id="akazi_kose_id" value="<?php echo $show_akazi['akazi_kose_id'] ?>" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
