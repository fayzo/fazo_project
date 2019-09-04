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

$act_id = mysql_real_escape_string($_GET['act_id']);
$get_activity_records = mysql_query("SELECT * FROM  ibikorwa_bitandukanye WHERE act_id = '$act_id' AND employee_id=".$_SESSION['employee_id']."");
$show_igikorwa = mysql_fetch_array($get_activity_records);

$get_activity_remark = mysql_query("SELECT note_id,products,cost, description, created, employee_id, act_id FROM purchase_details WHERE act_id = '$act_id' AND employee_id=".$_SESSION['employee_id']."");

$total_records = mysql_num_rows($get_activity_remark);

if(isset($_POST['create'])) {

$description = htmlentities($_POST['description'], ENT_QUOTES);
$act_id = htmlentities($_POST['act_id'], ENT_QUOTES);
$products = htmlentities($_POST['products'], ENT_QUOTES);
$cost = htmlentities($_POST['cost'], ENT_QUOTES);

$employee_id =mysql_real_escape_string($_SESSION['employee_id']);

$doSQL = "INSERT INTO purchase_details (products, description, cost, act_id,  employee_id) VALUES ('$products','$description','$cost', '$act_id', '$employee_id')";

mysql_query($doSQL) or die(mysql_error());

header("Location: ibigize_igikorwa.php?act_id=$act_id");

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
    <?php include_once("../users/login_info.php") ?>
  </div>
  <div id="navbar">
    <?php include_once("navbar2.php") ?>
  </div>
  <div id="content">
    <form id="ibigize_igikorwa" name="ibigize_igikorwa" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<h2>IBIGIZE IGIKORWA: <?php echo $show_igikorwa['izina_rygikorwa'] ?></h2>
      <table width="101%" class="fulltable">
        <tr>
		<td width="5%" class="tabletop">SIBA </td>
          <td width="26%" class="tabletop">HAKENEWE </td>
          <td width="54%" class="tabletop">IGISOBANURO MURIMAKE</td>
          <td width="15%" class="tabletop" align="right">AMAFARANGA </td>
        </tr>
        <?php while($show_activity_records = mysql_fetch_array($get_activity_remark)) { ?>
      
        <tr class="tablelist">
          <td class="tablerowborder"><a href="siba_ibigizigikorwa.php?note_id=<?php echo $show_activity_records['note_id'] ?>&act_id=<?php echo $show_activity_records['act_id'] ?>" onClick="return confirm('Urifuza koko gusiba: <?php echo $show_activity_records['products'] ?> ?')"><img src="../images/icons/delete.png" alt="GUSIBA" width="16" height="16" class="iconspacer" /></a></td>
		  <td class="tablerowborder"><?php echo $show_activity_records['products'] ?></td>
          <td class="tablerowborder"><?php echo $show_activity_records['description'] ?></td>
          <td class="tablerowborder" align="right"> <?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_activity_records['cost'], 0) ?></td>
        </tr>
        <?php } ?>
        <tr>
		<td>&nbsp;</td>
          <td><input name="products" type="text" class="entrytext" id="products"/></td>
          <td><textarea name="description" class="entrybox" id="description" ></textarea></td>
		   <td><input name="cost" type="text" class="entrytext" id="cost"/></td>
        </tr>
      </table>
      <table class="fulltable">
        <tr>
          <td><input name="create" type="submit" class="button" id="create" value="BYEMEZE" onclick="return confirmSubmit()"/>
            <input name="back" type="button" class="button" id="back" onclick="javascript:history.go(-1)" value="SUBIRINYUMA" />
          <input name="act_id" type="hidden" id="act_id" value="<?php echo $show_igikorwa['act_id'] ?>" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
