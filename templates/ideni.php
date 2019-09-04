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
include("../inc/dbconfig.php");

$get_company = mysql_query("SELECT * FROM company");
$show_company = mysql_fetch_array($get_company);

$employee_id = mysql_real_escape_string($_SESSION['employee_id']);


$get_employees = mysql_query("SELECT * FROM employees WHERE employee_id=".$_SESSION['employee_id']."");
$show_employee = mysql_fetch_array($get_employees);



$get_ideni = mysql_query("SELECT * FROM abonagurije WHERE id='$id' AND employee_id=".$_SESSION['employee_id']."");
$show_ideni = mysql_fetch_array($get_ideni);

$get_kwishyurwa = mysql_query("SELECT * FROM  kwishyura_ideni WHERE ide_id='$id' AND employee_id=".$_SESSION['employee_id']." ORDER BY itariki_yishyuwe Desc");






?>



<p><br>
</p>
<p>&nbsp;</p>
<p><br />
  <br />
  
  
</p>
<table width="770" border="1">
<tr>
<td width="244" bgcolor="#006666"><strong><font color="#FFFFFF">UWONAGURIJE</font></strong></td>
<td width="86" align="LEFT" bgcolor="#006666"><strong><font color="#FFFFFF">TARIKI </font></strong></td>
<td width="128" align="RIGHT" bgcolor="#006666"><strong><font color="#FFFFFF">NAMUGURIJE</font></strong></td>
<td width="138" align="RIGHT" bgcolor="#006666"><strong><font color="#FFFFFF">ANSIGAYEMO</font></strong></td>
<td width="140" align="RIGHT" bgcolor="#006666"><strong><font color="#FFFFFF"> AYISHYUWE </font></strong></td></tr>
    <tr><td width="244"><font color="#000000" size="9" face="Arial"><?php echo $show_ideni['uwonagurije'] ?></font></td>
<td width="86" align="LEFT"><font color="#000000"><?php echo $show_ideni['namugurije_tariki'] ?></font></td>
<td width="128" align="RIGHT"><font color="#000000"><font face="Arial" size="10"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_ideni['namugurije'], 0) ?></font></td>
<td width="138" align="RIGHT"><font color="#000000"><font face="Arial" size="10"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_ideni['asigaye'], 0) ?></font></td>
<td width="140" align="RIGHT"><font color="#000000"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_ideni['hishyuwe'], 0) ?></font></td>
</tr>
</table>
<br />
<br />
<br />
<table>
<tr>
<td width="740" bgcolor="#006666"><b><font color="#FFFFFF">UKO NAGIYE NISHYURWA </font></b></td>
</tr>
</table>
<br />
<table border="1">
<tr>
<td width="143" bgcolor="#006666"><strong><font color="#FFFFFF">ITARIKI</font></strong></td>
<td width="598" align="right" bgcolor="#006666"><strong><font color="#FFFFFF">AYO NISHYUWE </font></strong></td>

</tr>
<?php while($show_kwishyurwa = mysql_fetch_array($get_kwishyurwa)) { ?>
<tr>
<td width="143"><font color="#000000" size="9" face="Arial"><?php echo $show_kwishyurwa['itariki_yishyuwe'] ?></font></td>
<td width="598" align="right"><font color="#000000"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_kwishyurwa['hishyuwe'], 0) ?></font></td>

</tr>
<?php } ?>
</table>

<BR /><BR /><BR />
<br />
<br />

