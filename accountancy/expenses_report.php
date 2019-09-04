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


if(isset($_GET['start'])) { $start = $_GET['start']; } else { $start = 0; };
$previous_page = ($start - $_SESSION['records_per_page']);
$next_page = ($start + $_SESSION['records_per_page']);

$get_total_expenses = mysql_query("SELECT * FROM expenses WHERE employee_id=".$_SESSION['employee_id']."");
$total_records = mysql_num_rows($get_total_expenses);
$get_expenses = mysql_query("SELECT * FROM expenses WHERE employee_id=".$_SESSION['employee_id']." ORDER BY expense_id DESC LIMIT $start, " . $_SESSION['records_per_page'] . "");

if(isset($_POST['query'])) {
$query = mysql_real_escape_string($_POST['query']);
$get_expenses = mysql_query("SELECT * FROM expenses WHERE (reason LIKE '%$query%') OR (date_received LIKE '%$query%') AND employee_id=".$_SESSION['employee_id']."");
$total_records = mysql_num_rows($get_expenses);
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

<link href="../css_codes/CalendarControl.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/CalendarControl.js"></script>
<script language="javascript">

function validateFormOnSubmit(theForm) {
var reason = "";

  reason += validateFr(theForm.query_from);
  reason += validateTo(theForm.query_to);
    
  if (reason != "") {
    alert("\n" + reason);
    return false;
  }

  return true;
}


function validateEmpty(fld) {
    var error = "";
  
    if (fld.value.length == 0) {
        fld.style.background = 'White'; 
        error = "Hitamo tariki"
    } else {
        fld.style.background = 'White';
    }
    return error;   
}


function validateFr(fld) {
    var error = "";
    
 
    if (fld.value == "") {
        fld.style.background = 'White'; 
        error = "Hitamo guhera.\n";
    } 
	 
	
	 else {
        fld.style.background = 'White';
    } 
    return error;
}
 function validateTo(fld) {
    var error = "";
    
 
    if (fld.value == "") {
        fld.style.background = 'White'; 
        error = "Hitamo kugera.\n";
    } 
	 
	
	 else {
        fld.style.background = 'White';
    } 
    return error;
}
 
</script>
</head>
<body>
<div id="wrap">
<div id="header"><table><tr><td><img src="../images/company_logo.jpg" alt="<?php echo $show_company['company_name'] ?>" /></td><td><br /></td>
  </tr></table></div>
  <div id="logininfo">
    <?php include_once("../users/login_info.php") ?>
  </div>
  <div id="navbar">
    <?php include_once("navbarout.php") ?>
  </div>
  <div id="content">
  <table class="fulltable">
        <tr>
          <td width="80%" class="halftopcell"><h1> RAPORO Y'AMAFARANGA YASOHOTSE </h1>
            <table width="100%" class="fulltable">
              
              <tr>
                <td><form method="post" action="../global/print_expenses.php" onSubmit="return validateFormOnSubmit(this)" target="_blank">Guhera: 
                    <input name="query_from" type="text" id="query_from"  class="entrytext2" onfocus="showCalendarControl(this);"/> 
                  &nbsp; Kugera: 
                    <input name="query_to" type="text" id="query_to"  class="entrytext2" onFocus="showCalendarControl(this);"/> &nbsp;<input type="submit" name="submit"   class="button" value="TANGA RAPORO" /> 
                </form></td>
              </tr>
          </table></td><td width="15%"><img src="../images/icons/raporo.jpg" width="113" height="98" class="iconspacer" /></td>
        </tr>
    </table>
   
      
      <table class="fulltable">
        <tr>
          <td width="24%" class="tabletop">Icyiciro</td>
          <td width="45%" class="tabletop">Impavu yasohotse</td>
          <td width="13%" class="tabletop"> Itariki </td>
          <td width="18%" class="tabletop" align="right">Umubare</td>
        </tr>
        <?php while($show_expense = mysql_fetch_array($get_expenses)) { ?>
        
        
		
        
        <?php $get_employees = mysql_query("SELECT * FROM employees WHERE employee_id=".$_SESSION['employee_id'].""); ?>
        <?php $show_employee = mysql_fetch_array($get_employees) ?>
        <tr class="tablelist">
          <td class="tablerowborder"><?php echo $show_expense['category_id'] ?></td>
                 <td class="tablerowborder"><span class="smalltext"><?php echo $show_expense['reason'] ?></span></td>
          <td class="tablerowborder"><?php echo $show_expense['date_received'] ?></a></td>
          <td class="tablerowborder" align="right"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_expense['amount'], 0) ?></td>
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
   
  </div>
</div>
</body>
</html>
