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

include("inc/dbconfig.php");
include("global/make_safe.php");

$get_company = mysqli_query($conn,"SELECT * FROM company");
$show_company = mysqli_fetch_array($get_company);


if((isset($_POST['login'])) and (!empty($_POST['ijambo_ryibanga']))) {

session_start();
session_name($_SERVER['SERVER_NAME']);

$email_yawe = mysqli_real_escape_string($conn,$_POST['email_yawe']);
$ijambo_ryibanga = $_POST['ijambo_ryibanga'];
// $ijambo_ryibanga = md5($_POST['ijambo_ryibanga']);

setcookie("company", $email_yawe, time()+(60*60*24*365));


//=============Select user in database==================================

$get_employees = mysqli_query($conn,"SELECT * FROM employees WHERE uremewe = 1 AND email_yawe = '$email_yawe'");
$show_employee = mysqli_fetch_array($get_employees);


//===========Define all session you want to use====================================

if($show_employee['ijambo_ryibanga'] == $ijambo_ryibanga) {
$_SESSION['uburenganzira_bwawe'] = $show_employee['uburenganzira_bwawe'];
$_SESSION['employee_id'] = $show_employee['employee_id'];
$_SESSION['amazinayose'] = $show_employee['amazinayose'];
$page_access = 1;

$_SESSION['records_per_page'] = $show_employee['records_per_page'];

header("Location: users/index.php");
exit;
};

header("Location: unauthorized.php");
exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" /> 
<title><?php include("title.php");?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/form_assist.js"></script>
</head>
<body onload="document.getElementById('account_password').focus()">
<script type="text/javascript" src="scripts/float_layer.js"></script>
<div id="smallwrap">
  <div id="header">
    <table><tr><td><img src="images/company_logo.jpg" alt="<?php echo $show_company['company_name'] ?>" width="445" /></td>
  <td><br /></td>
  </tr></table>
  </div>
  <div id="content">
    <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td width="30%" class="firstcell">E-mail Yawe:</td>
          <td width="70%"><input name="email_yawe" type="text" class="entrytext" id="email_yawe" /></td>
        </tr>
        <tr>
          <td class="firstcell">Ijambo ry' ibanga:</td>
          <td><input name="ijambo_ryibanga" type="password" class="entrytext" id="ijambo_ryibanga" /></td>
        </tr>
        <tr>
          <td class="firstcell">&nbsp;</td>
          <td><input name="login" type="submit" class="button" id="login" value="INJIRA" /> &nbsp;&nbsp; </td>
        </tr>
      </table>
	 
      <table class="fulltable">
        <tr>
          <td height="34" class="firstcell" align="center"><p><font color="#006666"><i>&copy; <?php echo date("Y") ?> Code.rw&nbsp; All rights reserved</i></font></p></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
