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

$get_income_categories = mysql_query("SELECT * FROM incomes_categories WHERE employee_id=".$_SESSION['employee_id']."");

$total_records = mysql_num_rows($get_income_categories);

# Process form when $_POST data is found for the specified form:
if(isset($_POST['create'])) {

$name = htmlentities($_POST['name'], ENT_QUOTES);
$employee_id = mysql_real_escape_string($_SESSION['employee_id']);

# Make MySQL statement:
$doSQL = "INSERT INTO incomes_categories (name,employee_id) VALUES ('$name','$employee_id')";

# Perform SQL command, show error (if any):
mysql_query($doSQL) or die(mysql_error());

# Return to screen:
header("Location: update_income_categories.php");

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
<script language="javascript">

function validateFormOnSubmit(theForm) {
var reason = "";

  reason += validateFr(theForm.name);
    
  if (reason != "") {
    alert("Injiza icyiciro\n" + reason);
    return false;
  }

  return true;
}


function validateEmpty(fld) {
    var error = "";
  
    if (fld.value.length == 0) {
        fld.style.background = 'White'; 
        error = "Injiza Icyiciro"
    } else {
        fld.style.background = 'White';
    }
    return error;   
}


function validateFr(fld) {
    var error = "";
    
 
    if (fld.value == "") {
        fld.style.background = 'White'; 
        error = "\n";
    } 
	 
	
	 else {
        fld.style.background = 'White';
    } 
    return error;
}
 
</script>
</head>
<body onload="document.getElementById('name').focus()">
<div id="smallwrap">
  <div id="header">
    <h2>IBYICIRO BY' AMAFARANGA YINJIRA</h2>
   
  </div>
  <div id="content">
    <form id="ayinjiye" name="ayinjiye" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" onSubmit="return validateFormOnSubmit(this)">
      <table class="fulltable">
        <tr>
          <td class="firstcell"><p>Izina ry' icyiciro:</p>
          <p>&nbsp;</p></td>
          <td><p>
            <input name="name" type="text" class="entrytext" id="name" />
          </p>
            <p>Urugero: Ubucuruzi, Umushahara, Ubukode,....  </p></td>
        </tr>
        <tr>
          <td class="firstcell">&nbsp;</td>
          <td><input name="create" type="submit" class="button" id="create" value="BYEMEZE" /></td>
        </tr>
      </table>
      <table class="fulltable">
        <tr>
          <td width="10%" class="tabletop">SIBA</td>
          <td class="tabletop">Izina ry' icyiciro:</td>
        </tr>
        <?php while($show_income_category = mysql_fetch_array($get_income_categories)) { ?>
        <tr class="tablelist">
          <td class="tablerowborder"><a href="delete_income_category.php?category_id=<?php echo $show_income_category['category_id'] ?>" onClick="return confirm('Urifuza koko gusiba: <?php echo $show_income_category['name'] ?> ?')"><img src="../images/icons/delete.png" alt="GUSIBA" width="16" height="16" class="iconspacer" /></a></td>
          <td class="tablerowborder"><?php echo $show_income_category['name'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </form>
  </div>
</div>
</body>
</html>
