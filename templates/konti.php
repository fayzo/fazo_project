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



$get_konti = mysql_query("SELECT * FROM kwizigamira WHERE item_id='$item_id' AND employee_id=".$_SESSION['employee_id']."");
$show_konti = mysql_fetch_array($get_konti);

$get_kubikuza = mysql_query("SELECT * FROM kubikuza_amafaranga WHERE item_id='$item_id' AND employee_id=".$_SESSION['employee_id']." ORDER BY tariki_abikujwe Desc");

$get_kubitsa = mysql_query("SELECT * FROM kuzigama_amafaranga WHERE item_id='$item_id' AND employee_id=".$_SESSION['employee_id']." ORDER BY itariki_nyazigamye Desc");





?>



<p><br>
  <br />
</p>
<p>&nbsp;</p>
<p><br />
  
  
</p>
<table width="743" border="1">
<tr><td width="267" bgcolor="#006666"  align="LEFT"><strong><font color="#FFFFFF">IZINA RYA BANKI </font></strong></td>
<td width="264" align="LEFT" bgcolor="#006666"><strong><font color="#FFFFFF">NIMERO YA KONTI </font></strong></td>
<td width="212" align="RIGHT" bgcolor="#006666"><strong><font color="#FFFFFF">AMAFARANGA NZIGAMYE </font></strong></td></tr>
    <tr><td width="267"  align="LEFT"><font color="#000000"><?php echo $show_konti['izina_bank'] ?></font></td>
<td width="264" align="LEFT"><font color="#000000"><?php echo $show_konti['nimero_konti'] ?></font></td>
<td width="212" align="RIGHT"><font color="#000000"><font face="Arial" size="10"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_konti['amafaranga_ariho'], 0) ?></font></td></tr>
</table>
<br />
<br />
<br />
<table>
<tr>
<td width="750" bgcolor="#006666"><b><font color="#FFFFFF">UKO NAGIYE MBIKUZA KURIYI KONTI </font></b></td>
</tr>
</table>
<br />
<table border="1">
<tr>
<td width="83" bgcolor="#006666"><strong><font color="#FFFFFF">ITARIKI</font></strong></td>
<td width="136" align="right" bgcolor="#006666"><strong><font color="#FFFFFF">AYO NABIKUJE </font></strong></td>
<td width="531"  bgcolor="#006666"><strong><font color="#FFFFFF">ICYO NARINGIYE KUYAKORESHA </font></strong></td>
</tr>
<?php while($show_kubikuza = mysql_fetch_array($get_kubikuza)) { ?>
<tr>
<td width="83"><font color="#000000" size="9" face="Arial"><?php echo $show_kubikuza['tariki_abikujwe'] ?></font></td>
<td width="136" align="right"><font color="#000000"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_kubikuza['nabikuje'], 0) ?></font></td>
<td width="531" ><font color="#000000"><font face="Arial" size="10"><?php echo $show_kubikuza['agiyegukoreshwa'] ?></font></td>
</tr>
<?php } ?>
</table>

<BR /><BR /><BR />
<table>
<tr>
<td width="750" bgcolor="#006666"><b><font color="#FFFFFF">UKO NAGIYE NZIGAMA KURIYI KONTI </font></b></td>
</tr>
</table>
<br />
<table border="1">
<tr>
<td width="83" bgcolor="#006666"><strong><font color="#FFFFFF">ITARIKI</font></strong></td>
<td width="141" align="right" bgcolor="#006666"><strong><font color="#FFFFFF">AYO NAZIGAMYE </font></strong></td>
<td width="526"  bgcolor="#006666"><strong><font color="#FFFFFF">AHO YARATURUTSE </font></strong></td>
</tr>
<?php while($show_kubitsa = mysql_fetch_array($get_kubitsa)) { ?>
<tr>
<td width="83"><font color="#000000" size="9" face="Arial"><?php echo $show_kubitsa['itariki_nyazigamye'] ?></font></td>
<td width="141" align="right"><font color="#000000"><?php echo $show_company['currency_symbol'] ?> <?php echo number_format($show_kubitsa['nazigamye'], 0) ?></font></td>
<td width="526" ><font color="#000000"><font face="Arial" size="10"><?php echo $show_kubitsa['ahoyeraturutse'] ?></font></td>
</tr>
<?php } ?>
</table>
<br />

