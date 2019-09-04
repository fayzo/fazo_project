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

$get_ibikorwa = mysql_query("SELECT * FROM ibikorwa_bitandukanye WHERE act_id = '$act_id' AND employee_id=".$_SESSION['employee_id']."");
$show_ibikorwa = mysql_fetch_array($get_ibikorwa);

$get_employees = mysql_query("SELECT * FROM employees WHERE employee_id=".$_SESSION['employee_id']."");
$show_employee = mysql_fetch_array($get_employees);



$get_ibigize_igikorwa = mysql_query("SELECT * FROM purchase_details WHERE act_id = '$act_id' AND employee_id=".$_SESSION['employee_id']."");


$get_ibigize_igikorwa_sum = mysql_query("SELECT SUM(cost) FROM purchase_details WHERE act_id = '$act_id' AND employee_id=".$_SESSION['employee_id']."");
$show_ibigize_igikorwa_sum = mysql_fetch_array($get_ibigize_igikorwa_sum);


?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<br>
<table>
<tr>
<td width="402" bgcolor="#006666"><font face="Arial" size="10"><font color="#FFFFFF"><b> <?php echo $show_ibikorwa['izina_rygikorwa'] ?></b></font></font></td>
<td width="402" align="RIGHT" bgcolor="#006666">&nbsp;</td>
</tr>
</table>
<table>
<tr>
<td width="181"> <strong>Uwo igikorwa gikorewe    </strong></td>
<td width="337" align="left">:  <?php echo $show_ibikorwa['uwogikorewe'] ?></td>
</tr>

<tr>
<td width="181"><strong>Igihe  cyatangiye </strong></td>
<td width="337" align="left">:  <?php echo $show_ibikorwa['itariki_cyatangiye'] ?></td>
</tr>
<tr>
<td width="181"><strong>Aho igikorwa kigeze   </strong></td>
<td width="337" align="left">:  <?php echo $show_ibikorwa['ahokigeze'] ?></td>
</tr>
</table>
<br />

<br />
<table border="1">
<tr>
<td width="200" bgcolor="#006666"><font color="#FFFFFF"><strong>HAKENEWE</strong></font></td>
<td width="460"  bgcolor="#006666"><font color="#FFFFFF"><strong>IGISOBANURO MURIMAKE</strong></font></td>
<td width="144" align="RIGHT" bgcolor="#006666"><strong><font color="#FFFFFF">AMAFARANGA</font></strong></td>
</tr>
<?php while($show_ibigize_igikorwa = mysql_fetch_array($get_ibigize_igikorwa)) { ?>
<tr>
<td width="200"><font color="#000000" size="9" face="Arial"><?php echo $show_ibigize_igikorwa['products'] ?></font></td>
<td width="460"><font color="#000000"><?php echo nl2br($show_ibigize_igikorwa['description']) ?></font></td>
<td width="144" align="RIGHT"><font color="#000000"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_ibigize_igikorwa['cost'], 0) ?></font></td>
</tr>
<?php } ?>
</table>
<br />
<table>

<tr>
<td width="500">&nbsp;</td>
<td width="160" align="RIGHT"><strong>AMAFARANGA YOSE:</strong></td>
<td width="144" align="RIGHT"><strong><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_ibigize_igikorwa_sum['SUM(cost)'], 0) ?></strong></td>
</tr>
</table>
<br />
<p>&nbsp;</p>
