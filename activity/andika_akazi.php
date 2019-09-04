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

$get_company = mysqli_query($conn,"SELECT * FROM company");
$show_company = mysqli_fetch_array($get_company);



$get_akazi = mysqli_query($conn,"SELECT akazi_id FROM akazi_kaburimunsi WHERE  employee_id=".$_SESSION['employee_id']." ORDER BY akazi_id DESC LIMIT 1");
$show_akazi = mysqli_fetch_array($get_akazi);

$get_employees = mysqli_query($conn,"SELECT * FROM employees WHERE  employee_id=".$_SESSION['employee_id']."");

if(isset($_POST['create'])) {

$tariki_yakazi = htmlentities($_POST['tariki_yakazi'], ENT_QUOTES);
$umunsiwakazi = htmlentities($_POST['umunsiwakazi'], ENT_QUOTES);
$employee_id = mysqli_real_escape_string($conn,$_SESSION['employee_id']);


$doSQL = "INSERT INTO akazi_kaburimunsi (tariki_yakazi, umunsiwakazi, employee_id) VALUES ('$tariki_yakazi', '$umunsiwakazi', '$employee_id')";

mysqli_query($conn,$doSQL) or die(mysqli_error());

$akazi_id = mysqli_insert_id();


$date_due = date('Y-m-d');



header("Location: hindura_akazi.php?akazi_id=$akazi_id");

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/vnd.microsoft.icon" href="../favicon.ico" />
<meta http-equiv="Refresh" content="<?php echo $show_company['session_timeout'] ?>;URL=../timeout.php" />
<title><?php include("../title.php");?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/form_assist.js"></script>
<script type="text/javascript" src="../scripts/auto_suggest.js"></script>
<link href="../css_codes/CalendarControl.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/CalendarControl.js"></script>
</head>
<body>
<div id="wrap">
<div id="header"><table><tr><td><img src="../images/company_logo.jpg" alt="<?php echo $show_company['company_name'] ?>" /></td><td><br /></td>
  </tr></table></div>
  <div id="logininfo">
    <?php include_once("../users/login_info.php") ?>
  </div>
  <div id="navbar">
    <?php include_once("navbar.php") ?>
  </div>
  <div id="content">
  <h1>ANDIKA AKAZI URIBUKORE </h1>
    <form id="andika_akazi" name="andika_akazi" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td class="halftopcell"><h2>ITARIKI N' UMUNSI: </h2>
            <table class="fulltable">
              <tr>
                <td class="firstcell">TARIKI KARAKORWAHO  :</td>
                <td><input name="tariki_yakazi" type="text" class="entrytext" id="tariki_yakazi" onfocus="showCalendarControl(this);" value="<?php $date=date('Y-m-d'); echo $date; ?>"/>
                  <br />
                <div id="results"></div></td></tr>
              <tr>
                <td height="55" class="firstcell">UMUNSI KARAKORWAHO :</td>
                <td>
				<input name="umunsiwakazi" type="text" class="entrytext" id="umunsiwakazi" />
				
				</td>
              </tr>
          </table></td>
          <td class="halftopcell"><h2>URIBUGAKORE:</h2>
            <table class="fulltable">
              <tr>
                <td class="firstcell">AMAZINA:</td>
                <td><select name="employee_id" class="entrytext" id="employee_id">
                    <?php while($show_employee = mysqli_fetch_array($get_employees)) { ?>
                    <option value="<?php echo $show_employee['employee_id'] ?>"<?php if($_SESSION['employee_id'] == $show_employee['employee_id']) { ?> selected="selected"<?php } ?>><?php echo strtoupper($show_employee['amazinayose']) ?></option>
                    <?php } ?>
                  </select></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table class="fulltable">
        <tr>
          <td><input name="create" type="submit" class="button" id="create" value="BYEMEZE" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
