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

$akazi_kose_id = mysql_real_escape_string($_GET['akazi_kose_id']);

$employee_id = mysql_real_escape_string($_SESSION['employee_id']);


$get_akazi = mysql_query("SELECT * FROM akazi_kose WHERE akazi_kose_id='$akazi_kose_id' AND employee_id=".$_SESSION['employee_id']."");
$show_akazi = mysql_fetch_array($get_akazi);

$akazi_id=$show_akazi['akazi_id'];

if(isset($_GET['akazi_kose_id']))
{

$delete_akazi = mysql_query("DELETE FROM akazi_kose WHERE akazi_kose_id = '{$_GET['akazi_kose_id']}' AND employee_id=".$_SESSION['employee_id']."")or die('Error : ' . mysql_error());


//mysql_query($delete_akazi) or die(mysql_error());
header("Location: hindura_akazi.php?akazi_id=$akazi_id");
}

header("Location: hindura_akazi.php?akazi_id=$akazi_id");

?>