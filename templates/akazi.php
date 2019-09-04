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
include("../inc/dbconfig.php");

$get_company = mysql_query("SELECT * FROM company");
$show_company = mysql_fetch_array($get_company);



$get_employees = mysql_query("SELECT * FROM employees WHERE employee_id=".$_SESSION['employee_id']."");
$show_employee = mysql_fetch_array($get_employees);

$get_umunsi = mysql_query("SELECT * FROM akazi_kaburimunsi WHERE akazi_id='$akazi_id' AND employee_id=".$_SESSION['employee_id']."");
$show_umunsi = mysql_fetch_array($get_umunsi);


$get_kosehamwe = mysql_query("SELECT COUNT(akazi_id) FROM akazi_kose WHERE akazi_id='$akazi_id' AND employee_id=".$_SESSION['employee_id']."");
$show_kosehamwe = mysql_fetch_array($get_kosehamwe);

$get_akakozwe = mysql_query("SELECT COUNT(akazi_id) FROM akazi_kose WHERE ahokageze='Karangiye' AND akazi_id='$akazi_id' AND employee_id=".$_SESSION['employee_id']."");
$show_akakozwe = mysql_fetch_array($get_akakozwe);

$get_akatarakorwa = mysql_query("SELECT COUNT(akazi_id) FROM akazi_kose WHERE ahokageze='Ntikarikakorwa' AND akazi_id='$akazi_id' AND employee_id=".$_SESSION['employee_id']."");
$show_akatarakorwa = mysql_fetch_array($get_akatarakorwa);

$get_akazi = mysql_query("SELECT * FROM akazi_kose WHERE akazi_id='$akazi_id' AND employee_id=".$_SESSION['employee_id']." ORDER BY karatangira Asc");

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
<table width="770">
<tr>
<td width="400" bgcolor="#006666"><font face="Arial" size="10"><font color="#FFFFFF"><b>AKAZI KO : <?php echo $show_umunsi['umunsiwakazi'] ?>, <?php echo $show_umunsi['tariki_yakazi'] ?></b></font></font></td>
<td width="370" align="RIGHT" bgcolor="#006666">&nbsp;</td>
</tr>
</table>
<br />
<table width="845" border="1">
<tr>
<td width="80" bgcolor="#006666"><strong><font color="#FFFFFF">GUHERA</font></strong></td>
<td width="80" align="left" bgcolor="#006666"><strong><font color="#FFFFFF">KUGEZA</font></strong></td>
<td width="500" align="left" bgcolor="#006666"><font color="#FFFFFF"><strong>IZINA RYAKAZI</strong></font></td>
<td width="110" align="left" bgcolor="#006666"><font color="#FFFFFF"><strong>UMWANZURO</strong></font></td>
</tr>
<?php while($show_akazi = mysql_fetch_array($get_akazi)) { ?>
<tr>
<td width="80"><?php echo $show_akazi['karatangira'] ?></td>
<td width="80" align="left"><?php echo $show_akazi['kararangira'] ?></td>
<td width="500" align="left"><?php echo $show_akazi['izinaryakazi'] ?></td>
<td width="110" align="left"><?php $umwanzuro=$show_akazi['ahokageze']; if($umwanzuro=='Ntikarikakorwa'){echo"<font color='red'><b>$umwanzuro</b></font>"; } 
		 
		  if($umwanzuro=='Karangiye'){echo"<font color='green'><b>$umwanzuro</b></font>"; }		  
		  ?>		    </td>
</tr>
<?php } ?>
</table>

<br />
<table width="780" border="1">
<tr>
<td width="158" bgcolor="#006666"><strong><font color="#FFFFFF">AKAZI KOSE  </font></strong></td>
<td width="167" align="left" bgcolor="#006666"><strong><font color="#FFFFFF">AKAZI KAKOZWE </font></strong></td>
<td width="172" align="left" bgcolor="#006666"><font color="#FFFFFF"><strong>AKAZI KATAKOZWE </strong></font></td>
<td width="275" align="left" bgcolor="#006666"><strong><font color="#FFFFFF">IJANISHA RY' AKAZI KAKOZWE </font></strong></td>
</tr><tr>
<td width="158" align="center"><b> <?php echo $show_kosehamwe['COUNT(akazi_id)'] ?></b></td>
<td width="167" align="center"><b><?php echo $show_akakozwe['COUNT(akazi_id)'] ?></b></td>
<td width="172" align="center"><b> <?php echo $show_akatarakorwa['COUNT(akazi_id)'] ?></b></td>
<td width="275" align="center"><?php $ijanisha=(number_format($show_akakozwe['COUNT(akazi_id)'], 2)*100)/number_format($show_kosehamwe['COUNT(akazi_id)'], 2); if($ijanisha<'50'){ echo"<font color=red><b>". number_format($ijanisha, 2)." % </b></font>";} if($ijanisha>='50'){ echo"<font color=black><b> ". number_format($ijanisha, 2)." % </b></font>";}?>		    </td>
</tr>

</table>