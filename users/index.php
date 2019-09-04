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
if($page_access =='1' OR $page_access =='2'){


include_once("session_check.php");

include_once("../inc/dbconfig.php");
$get_company = mysqli_query($conn,"SELECT * FROM company");
$show_company = mysqli_fetch_array($get_company);


$employee_id = mysqli_real_escape_string($conn,$_SESSION['employee_id']);



}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="icon" type="image/vnd.microsoft.icon" href="../favicon.ico" /> 
<title><?php include("../title.php");?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/form_assist.js"></script>
<script type="text/javascript" src="../scripts/tooltip.js"></script>
<link href="../css_codes/CalendarControl.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/CalendarControl.js"></script>
</head>
<body>
<script type="text/javascript" src="../scripts/float_layer.js"></script>
<div id="wrap">
<?php 
include_once("../inc/dbconfig.php");
$get_company = mysqli_query($conn,"SELECT * FROM company");
$show_company = mysqli_fetch_array($get_company);
 ?>
 <div id="header"><table><tr><td><img src="../images/company_logo.jpg" alt="<?php echo $show_company['company_name'] ?>" /></td><td><br /></td>
  </tr></table></div>
<div id="logininfo">
    <?php include_once("login_info.php") ?>
  </div>
    <div id="navbar">
                  <?php include_once("navbar.php") ?>
  </div>
  <div id="content">
   
     
      <table class="fulltable2" height="300">
        <tr>
          <td class="halftopcell">
            <table width="50%">
              
              <tr>
                <td width="33%" class="halftopcell"><BR />&nbsp;</td> <td width="28%" class="halftopcell"><BR />&nbsp;<br /><br /><br /><br /></td>
              </tr>
                <tr>
                <td width="33%" class="halftopcell"><BR />&nbsp;</font></td> <td width="28%" class="halftopcell"><BR />&nbsp;<a href="../transaction/ibikorwa_bitandukanye.php"><img src="../images/icons/ib.png" alt="IBIKORWA" width="54" height="54" class="iconspacer" /><br />
                <font color="#FFFFFF">&nbsp;&nbsp;IBIKORWA</font></a></td>
              </tr>
                <tr>
                <td width="33%" class="halftopcell"><BR />&nbsp;<a href="../transaction/kuzigama.php"><img src="../images/icons/Bank.png" alt="KUZIGAMA" width="54" height="54" class="iconspacer" /><br />
                  <font color="#FFFFFF">&nbsp;&nbsp;&nbsp;KUZIGAMA</font></a></td> 
                <td width="28%" class="halftopcell"><BR />&nbsp;<a href="../accountancy/expenses.php"><img src="../images/icons/expense-recorder-pro-icon.png" alt="AMAFARANGA YASOHOTSE" width="54" height="54" class="iconspacer" /><br />
                <font color="#FFFFFF">&nbsp;&nbsp;AYASOHOTSE</font></a></td>
              </tr>
              <tr>
                <td width="33%" class="halftopcell"><BR />&nbsp;<a href="../activity/akazi_kaburimunsi.php"><img src="../images/icons/akazi.png" alt="AKAZI KABURIMUNSI" width="56" class="iconspacer" /><br />
                  <font color="#FFFFFF">&nbsp;&nbsp;AKAZIKUMUNSI</font></a></td> 
                <td width="28%" class="halftopcell"><BR />&nbsp;<a href="javascript:openWindow('help.php')"><img src="../images/icons/help.png" alt="UBUFASHA" class="iconspacer" /><br />
                <font color="#FFFFFF">&nbsp;&nbsp;UBUFASHA</font></a></td>
              </tr>
              <tr>
                <td colspan="2" class="halftopcell">&nbsp;</td> 
              </tr>
        </table></td></tr>
    </table>
       
  </div>
</div>
</body>
</html>
