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

$note_id = mysql_real_escape_string($_GET['note_id']);
$act_id = mysql_real_escape_string($_GET['act_id']);

$delete_ibigizigikorwa = mysql_query("DELETE FROM purchase_details WHERE note_id = '$note_id' AND employee_id=".$_SESSION['employee_id']."");

header("Location: ibigize_igikorwa.php?act_id=$act_id");

?>