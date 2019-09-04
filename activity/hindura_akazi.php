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
$page_access =1;

include_once("../users/session_check.php");

include_once("../inc/dbconfig.php");

include_once("../global/make_safe.php");

$get_company = mysql_query("SELECT * FROM company");
$show_company = mysql_fetch_array($get_company);

$akazi_id= mysql_real_escape_string($_GET['akazi_id']);
$get_akazi = mysql_query("SELECT * FROM akazi_kaburimunsi WHERE akazi_id = '$akazi_id' AND employee_id=".$_SESSION['employee_id']."");
$show_akazi = mysql_fetch_array($get_akazi);



$get_akazi_kose = mysql_query("SELECT * FROM akazi_kose WHERE akazi_id = '$akazi_id' AND employee_id=".$_SESSION['employee_id']." ORDER BY karatangira Asc");



$get_employees = mysql_query("SELECT * FROM employees WHERE  employee_id=".$_SESSION['employee_id']."");
$show_employee = mysql_fetch_array($get_employees);

if(isset($_POST['update'])) {

$tariki_yakazi = htmlentities($_POST['tariki_yakazi'], ENT_QUOTES);
$umunsiwakazi = htmlentities($_POST['umunsiwakazi'], ENT_QUOTES);
$employee_id = mysql_real_escape_string($_SESSION['employee_id']);

$akazi_id = mysql_real_escape_string($_POST['akazi_id']);


$doSQL = "UPDATE akazi_kaburimunsi SET tariki_yakazi = '$tariki_yakazi', umunsiwakazi = '$umunsiwakazi' WHERE akazi_id = '$akazi_id' AND employee_id=".$_SESSION['employee_id']."";

mysql_query($doSQL) or die(mysql_error());

if(!empty($_POST['izinaryakazi'])) {


$akazi_id = htmlentities($_POST['akazi_id'], ENT_QUOTES);
$izinaryakazi = htmlentities($_POST['izinaryakazi'], ENT_QUOTES);
$karatangira = htmlentities($_POST['karatangira'], ENT_QUOTES);
$kararangira = htmlentities($_POST['kararangira'], ENT_QUOTES);
$ahokageze = htmlentities($_POST['ahokageze'], ENT_QUOTES);
$employee_id = mysql_real_escape_string($_SESSION['employee_id']);

$doSQL = "INSERT INTO akazi_kose (akazi_id, izinaryakazi, karatangira,  kararangira, ahokageze,  employee_id) VALUES ('$akazi_id','$izinaryakazi', '$karatangira', '$kararangira', '$ahokageze', '$employee_id')";

mysql_query($doSQL) or die(mysql_error());


header("Location: hindura_akazi.php?akazi_id=$akazi_id");
}

else
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
<script type="text/javascript" src="../scripts/product_auto_suggest2.js"></script>
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
    <?php include_once("navbar.php") ?>
  </div>
  
  <div id="content">
 <P>&nbsp;</P>
 <h2>ANDIKA BURIKAZI NAMASAHA URIBUGAKOREHO </h2>
 <form id="hindura_akazi" name="hindura_akazi" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td class="halftopcell">
            <table class="fulltable">
              <tr>
                <td class="firstcell">TARIKI KARAKORWAHO  :</td>
                <td><input name="tariki_yakazi" type="text" class="entrytext" id="tariki_yakazi" value="<?php echo strtoupper($show_akazi['tariki_yakazi']) ?>" />                </td>
              </tr>
              <tr>
                <td class="firstcell">UMUNSI KARAKORWAHO :</td>
                <td><input name="umunsiwakazi" type="text" class="entrytext" id="umunsiwakazi" value="<?php echo $show_akazi['umunsiwakazi'] ?>" /></td>
              </tr>
            </table>
          </td>
          <td class="halftopcell">&nbsp;</td>
        </tr>
      </table>
       
      <table class="fulltable">
        <tr>
          <td width="4%" class="tabletop">SIBA</td>
		  <td width="9%" class="tabletop">GUHERA</td>
		   <td width="8%" class="tabletop" align="left">KUGEZA</td>
          <td width="62%" class="tabletop">IZINA RYAKAZI</td>
          
          <td width="17%" class="tabletop" align="left">UMWANZURO</td>
	    </tr>
        <?php while($show_burikazi = mysql_fetch_array($get_akazi_kose)) { ?>
        <?php $get_employees = mysql_query("SELECT * FROM employees WHERE employee_id=".$_SESSION['employee_id'].""); ?>
        <?php $show_employee = mysql_fetch_array($get_employees) ?>
        <tr class="tablelist">
          <td class="tablerowborder"><a href="siba_akazi.php?akazi_kose_id=<?php echo $show_burikazi['akazi_kose_id'] ?>" onClick="return confirm('Koko urashaka gusiba:  <?php echo $show_burikazi['izinaryakazi'] ?> ?')"><img src="../images/icons/delete.png" alt="SIBA AKAZI" width="16" height="16" class="iconspacer" /></a></td>
          
          <td class="tablerowborder"><?php echo $show_burikazi['karatangira'] ?></td>
          <td class="tablerowborder" align="left"><?php echo $show_burikazi['kararangira'] ?></td>
		  <td class="tablerowborder"><?php echo $show_burikazi['izinaryakazi'] ?>          </td>
		  <td class="tablerowborder" align="left"><?php $umwanzuro=$show_burikazi['ahokageze']; if($umwanzuro=='Ntikarikakorwa'){echo"<font color=red><b>$umwanzuro</b></font>"; } 
		 
		  if($umwanzuro=='Karangiye'){echo"<font color=green><b>$umwanzuro</b></font>"; }		  
		  ?>		    &nbsp;&nbsp;<a href="javascript:openWindow('umwanzuro_wakazi.php?akazi_kose_id=<?php echo $show_burikazi['akazi_kose_id'] ?>')"><img src="../images/icons/edit.png" alt="Delete Item" width="16" height="16" class="iconspacer" align="right"/></a></td>
		</tr>
        <?php } ?>
        <tr>
          <td>&nbsp;</td>
          <td><input name="karatangira" type="text" class="entrytext" id="karatangira" size="5" value="00:00"/></td>
		  <td><input name="kararangira" type="text" class="entrytext" id="kararangira"  size="5" value="00:00"/></td>
		  
		  <td><input name="izinaryakazi" type="text" class="entrytext" id="izinaryakazi" /></td>
          <td><select name="ahokageze" class="entrytext" id="ahokageze">
            <option value="Ntikarikakorwa">Ntikarikakorwa</option>
            
            <option value="Karangiye">Karangiye</option>
          </select></td>
        </tr>
      </table>
      <table class="fulltable">
        <tr>
          <td width="75%" rowspan="5" class="topalign"><table class="fulltable">
              <tr>
                <td> <a href="javascript:openWindow('../global/print_akazi.php?akazi_id=<?php echo $show_akazi['akazi_id'] ?>')"><img src="../images/icons/print.png" alt="RAPORO" width="16" height="16" class="iconspacer" /> RAPORO</a></td>
              </tr>
            </table>
            <table class="fulltable">
              <tr>
                <td><input name="update" type="submit" class="button" id="update" value="BYEMEZE" />
                <input name="akazi_id" type="hidden" id="akazi_id" value="<?php echo $show_akazi['akazi_id'] ?>" /></td>
              </tr>
          </table></td>
          <td colspan="2">&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
