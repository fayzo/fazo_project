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


if(isset($_GET['start'])) { $start = $_GET['start']; } else { $start = 0; };
$previous_page = ($start - $_SESSION['records_per_page']);
$next_page = ($start + $_SESSION['records_per_page']);

$get_total_incomes = mysqli_query($conn,"SELECT * FROM incomes WHERE employee_id=".$_SESSION['employee_id']."");
$total_records = mysqli_num_rows($conn,$get_total_incomes);
$get_incomes = mysqli_query($conn,"SELECT * FROM incomes WHERE employee_id=".$_SESSION['employee_id']." ORDER BY income_id DESC LIMIT $start, " . $_SESSION['records_per_page'] . "");

if(isset($_POST['query'])) {
$query = mysqli_real_escape_string($_POST['query']);
$get_incomes = mysqli_query($conn,"SELECT * FROM incomes WHERE (reason LIKE '%$query%') OR (date_received LIKE '%$query%') AND employee_id=".$_SESSION['employee_id']."");
$total_records = mysqli_num_rows($conn,$get_incomes);
$next_page = $total_records;
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
<script type="text/javascript" src="../scripts/tooltip.js"></script>
</head>
<body>
<div id="wrap">
<div id="header"><table><tr><td><img src="../images/company_logo.jpg" alt="<?php echo $show_company['company_name'] ?>" /></td><td><br /></td>
  </tr></table></div>
  <div id="logininfo">
    <?php include_once("../users/login_info.php") ?>
  </div>
  <div id="navbar">
    <?php include_once("navbarin.php") ?>
  </div>
  <div id="content">
    <form id="ayinjiye" name="ayinjiye" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td class="halftopcell"><h1>URUTONDE RW' AMAFARANGA YINJIYE </h1>
            <table class="fulltable">
             
              <tr>
                <td><input name="query" type="text" class="entrytext" id="query" onclick="this.value=''" value="Shakira hano" /></td>
              </tr>
              
              <tr>
                <td><input name="create" type="button" class="button" id="create" onclick="openWindow('create_income.php')" value="ANDIKA AYINJIYE" /> <input name="categories" type="button" class="button" id="categories" onclick="openWindow('update_income_categories.php')" value="IBYICIRO" /></td>
              </tr>
          </table></td>
          <td class="halftopcell"><img src="../images/icons/income_icon.gif" width="134" height="131" class="iconspacer" /></td>
        </tr>
      </table>
      <table class="fulltable">
        <tr>
          <td width="5%" class="tabletop">SIBA</td>
          <td width="4%" class="tabletop">KOSORA</td>
          <td width="25%" class="tabletop">ICYICIRO</td>
          <td width="41%" class="tabletop">AHO AMAFARANGA YATURUTSE</td>
          <td width="11%" class="tabletop">ITARIKI  </td>
          <td width="14%" class="tabletop" align="right">UMUBARE</td>
        </tr>
        <?php while($show_income = mysqli_fetch_array($get_incomes)) { ?>
        
     
       
        <?php $get_employees = mysqli_query($conn,"SELECT * FROM employees WHERE  employee_id=".$_SESSION['employee_id'].""); ?>
        <?php $show_employee = mysqli_fetch_array($get_employees) ?>
        <tr class="tablelist">
          <td class="tablerowborder"><a href="delete_income.php?income_id=<?php echo $show_income['income_id'] ?>" onClick="return confirm('Urifuza koko gusiba: <?php echo $show_income['reason'] ?> ?')"><img src="../images/icons/delete.png" alt="GUSIBA" width="16" height="16" class="iconspacer" /></a></td>
          <td class="tablerowborder"><a href="javascript:openWindow('update_income.php?income_id=<?php echo $show_income['income_id'] ?>')"> <img src="../images/icons/edit.png" alt="Edit" width="16" height="16" class="iconspacer" /></a></td>
          <td class="tablerowborder"><?php echo $show_income['category_id'] ?></td>
                 <td class="tablerowborder"><span class="smalltext"><?php echo $show_income['reason'] ?></span></td>
          <td class="tablerowborder"><?php echo $show_income['date_received'] ?></a></td>
          <td class="tablerowborder" align="right"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_income['amount'], 0) ?></td>
        </tr>
        <?php } ?>
      </table>
      <table class="fulltable">
        <tr>
          <td class="pagination"><?php if ($start > 0) { ?>
            <a href="?start=<?php echo $previous_page ?>"><img src="../images/icons/previous.png" alt="Prevous Page" width="16" height="16" class="iconspacer" /></a>
            <?php } ?>
            <?php if ($next_page < $total_records) { ?>
            <a href="?start=<?php echo $next_page ?>"><img src="../images/icons/next.png" alt="Next Page" width="16" height="16" class="iconspacer" /></a>
            <?php } ?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
