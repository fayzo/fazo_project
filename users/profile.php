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

include_once("session_check.php");

include_once("../inc/dbconfig.php");

include_once("../global/make_safe.php");

$get_company = mysql_query("SELECT * FROM company");
$show_company = mysql_fetch_array($get_company);

$employee_id = mysql_real_escape_string($_SESSION['employee_id']);
$get_employee = mysql_query("SELECT * FROM employees WHERE employee_id = '$employee_id'");
$show_employee = mysql_fetch_array($get_employee);

if(isset($_POST['update'])) {

$amazinayose = htmlentities($_POST['amazinayose'], ENT_QUOTES);
$telefone = htmlentities($_POST['telefone'], ENT_QUOTES);

$email_yawe = htmlentities($_POST['email_yawe'], ENT_QUOTES);



$doSQL = "UPDATE employees SET amazinayose = '$amazinayose', telefone = '$telefone', email_yawe = '$email_yawe' WHERE employee_id='$employee_id'";

mysql_query($doSQL) or die(mysql_error());

if($_POST['ijambo_ryibanga']!='') {
$ijambo_ryibanga = md5($_POST['ijambo_ryibanga']);
$employee_id = mysql_real_escape_string($_SESSION['employee_id']);

$doSQL2 = "UPDATE employees SET ijambo_ryibanga='$ijambo_ryibanga' WHERE employee_id='$employee_id'";

mysql_query($doSQL2) or die(mysql_error());


 }

header("Location: profile.php");

};

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
<body>
<div id="wrap">
<div id="header"><table><tr><td><img src="../images/company_logo.jpg" alt="<?php echo $show_company['company_name'] ?>" /></td><td><br /></td>
  </tr></table></div>
  <div id="logininfo">
    <?php include_once("login_info.php") ?>
  </div>
  <div id="navbar">
    <?php include_once("navbar.php") ?>
  </div>
  <div id="content">
    <form id="update_employee" name="update_employee" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td class="halftopcell"><h2>Imyirondoro:</h2>
            <table class="fulltable">
              <tr>
                <td class="firstcell">Amazina yawe :</td>
                <td colspan="2"><input name="amazinayose" type="text" class="entrytext" id="amazinayose" value="<?php echo $show_employee['amazinayose'] ?>" /></td>
              </tr>
              <tr>
                <td class="firstcell">Telefone yawe :</td>
                <td colspan="2"><input name="telefone" type="text" class="entrytext" id="telefone" onblur="cleanNumber(this);formatNumber(this);setWorkPrimary()" value="<?php echo $show_employee['telefone'] ?>" /></td>
              </tr>
              <tr>
                <td class="firstcell">email yawe:</td>
                <td><input name="email_yawe" type="text" class="entrytext" id="email_yawe" value="<?php echo $show_employee['email_yawe'] ?>" /></td>
                <td class="lastcell">&nbsp;</td>
              </tr>
              <tr>
                <td class="firstcell">Ijambo ryibanga rishya :<br /><font color="#FF0000"> Niba udashaka kurihindura wihuzuza </font>             </td>
                <td colspan="2"><input name="ijambo_ryibanga" type="password" class="entrytext" id="ijambo_ryibanga" value=""/></td>
              </tr>
            </table></td>
          <td class="halftopcell">
          </td>
        </tr>
      </table>
      <table class="fulltable">
        <tr>
          <td><input name="update" type="submit" class="button" id="update" value="BYEMEZE" onclick="return confirmSubmit()"/></td>
        </tr> 
      </table>
    </form>
  </div>
</div>
</body>
</html>
