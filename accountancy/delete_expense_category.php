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

$category_id = mysql_real_escape_string($_GET['category_id']);

$delete_expense_category = mysql_query("DELETE FROM expense_categories WHERE category_id = '$category_id' AND employee_id=".$_SESSION['employee_id']."");

header("Location: update_expense_categories.php")

?>