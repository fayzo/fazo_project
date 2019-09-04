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

$get_ayinjiye = mysql_query("SELECT * FROM incomes WHERE date_received >='$query_from' AND date_received<='$query_to' AND employee_id=".$_SESSION['employee_id']." ORDER BY date_received Desc");

$get_ayinjiye_sumarry = mysql_query("SELECT category_id,SUM(amount) FROM incomes WHERE date_received >='$query_from' AND date_received<='$query_to' AND employee_id=".$_SESSION['employee_id']." GROUP BY category_id Asc");

$get_ayinjiye_total = mysql_query("SELECT SUM(amount) FROM incomes WHERE date_received >='$query_from' AND date_received<='$query_to' AND employee_id=".$_SESSION['employee_id']."");
$show_ayinjiye_total = mysql_fetch_array($get_ayinjiye_total);

$get_kwinjiza_items = mysql_query("SELECT * FROM employees WHERE employee_id=".$_SESSION['employee_id']."");
if((!isset($_SESSION['employee_id']))) {
header("Location: ../restricted.php");
exit;
};

?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<br />
<table width="745">
<tr>
<td width="700" bgcolor="#006666"><font face="Arial" size="10" color="#FFFFFF"><b>Amafaranga yinjiye  : Guhera 
  <?php  echo"$query_from"; ?> Kugera <?php  echo"$query_to"; ?>
</b></font></td>
<td width="45" align="RIGHT" bgcolor="#006666">&nbsp;</td>
</tr>
</table>
<br>
<br />


<table width="671" border="1">
<tr bgcolor="#006666">
<td width="80"  bgcolor="#006666"><strong><font color="#FFFFFF">Itariki  </font></strong></td>
<td width="190"  bgcolor="#006666"><strong><font color="#FFFFFF">Icyiciro</font></strong></td>
<td width="340"  bgcolor="#006666"><strong><font color="#FFFFFF">Aho amafaranga yaturutse</font></strong></td>

<td width="134" align="RIGHT" bgcolor="#006666"><font color="#FFFFFF"><strong>Umubare </strong></font></td>
</tr>

<?php while($show_ayinjiye_report = mysql_fetch_array($get_ayinjiye)) { ?>
<tr>
<td width="80"  ><font color="#000000"><?php echo $show_ayinjiye_report['date_received'] ?></font></td>
<td width="190" ><font color="#000000"><?php echo $show_ayinjiye_report['category_id'] ?></font></td>
<td width="340"  ><font color="#000000"><?php echo $show_ayinjiye_report['reason'] ?></font></td>

<td width="134" align="RIGHT" ><font color="#000000"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_ayinjiye_report['amount'], 0) ?></font></td>
</tr>
<?php } ?>
</table>
<br />
<table width="671" border="1">
<tr bgcolor="#006666">
<td colspan="2"  bgcolor="#006666" align="center" width="647"><strong><font color="#FFFFFF">Uko amafaranga yinjiye muri buri cyiciro </font></strong></td>
</tr>
<tr bgcolor="#006666">

<td width="447"  bgcolor="#ffffff"><strong><font color="#000000">Icyiciro</font></strong></td>


<td width="200" align="RIGHT" bgcolor="#ffffff"><font color="#000000"><strong>Umubare </strong></font></td>
</tr>

<?php while($show_ayinjiye_sumarry = mysql_fetch_array($get_ayinjiye_sumarry)) { ?>
<tr>

<td width="447" ><font color="#000000"><?php echo $show_ayinjiye_sumarry['category_id'] ?></font></td>


<td width="200" align="RIGHT" ><font color="#000000"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_ayinjiye_sumarry['SUM(amount)'], 0) ?></font></td>
</tr>


<?php } ?>
<tr>

<td width="447" align="right"><strong>Amafaranga yose yinjiye </strong></td>


<td width="200" align="RIGHT" ><font color="#000000"><strong><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_ayinjiye_total['SUM(amount)'], 0) ?></strong></font></td>
</tr>
</table>
<br />
