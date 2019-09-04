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


if(isset($_GET['start'])) { $start = $_GET['start']; } else { $start = 0; };
$previous_page = ($start - $_SESSION['records_per_page']);
$next_page = ($start + $_SESSION['records_per_page']);



$employee_id =mysql_real_escape_string( $_SESSION['employee_id']);
$get_umuntu = mysql_query("SELECT * FROM employees WHERE employee_id=".$_SESSION['employee_id']."");
$show_umuntu = mysql_fetch_array($get_umuntu);

$get_total_ibikorwa = mysql_query("SELECT * FROM ibikorwa_bitandukanye WHERE employee_id=".$_SESSION['employee_id']."");
$total_records = mysql_num_rows($get_total_ibikorwa);

$get_activity = mysql_query("SELECT * FROM ibikorwa_bitandukanye  WHERE employee_id=".$_SESSION['employee_id']." ORDER BY act_id DESC LIMIT $start, " . $_SESSION['records_per_page'] . "");


if(isset($_GET['query'])) {
$query = mysql_real_escape_string($_GET['query']);
$get_activity = mysql_query("SELECT * FROM ibikorwa_bitandukanye WHERE (izina_rygikorwa LIKE '%$query%') OR (uwogikorewe LIKE '%$query%') OR (itariki_cyatangiye LIKE '%$query%') OR (ahokigeze LIKE '%$query%') AND  employee_id=".$_SESSION['employee_id']."");
$total_records = mysql_num_rows($get_activity);
$next_page = $total_records;
};



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
    <form id="ibikorwa_bitandukanye" name="ibikorwa_bitandukanye" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td class="halftopcell"><h1>Urutonde rwibikorwa bisaba amafaranga </h1>
            <table class="fulltable">
            
              <tr>
                <td><input name="query" type="text" class="entrytext" id="query" onclick="this.value=''" value="Shakira hano" /></td>
              </tr>
              
              <tr>
                <td><input name="create" type="button" class="button" id="create" onclick="openWindow('andika_ibikorwa_bitandukanye.php')" value="ANDIKA IGIKORWA GISHYA" /></td>
              </tr>
          </table></td>
          <td class="halftopcell"><img src="../images/icons/ibikorwa.png" width="134" height="131" class="iconspacer" /></td>
        </tr>
      </table>
      <table class="fulltable">
        <tr>
        <td width="6%" class="tabletop">RAPORO</td>
		 <td width="6%" class="tabletop">UMWANZURO</td>
		<td width="7%" class="tabletop">IBIKIGIZE </td>
          <td width="41%" class="tabletop">IZINA RYIGIKORWA</td>
                 <td width="21%" class="tabletop"> UWOGIKOREWE </td>
          <td width="10%" class="tabletop"> CYATANGIYE </td>
          <td width="9%" class="tabletop">AHOKIGEZE</td>
        </tr>
        <?php while($show_activity = mysql_fetch_array($get_activity)) { ?>
        <tr class="tablelist">
        <td class="tablerowborder"><a href="javascript:openWindow('../global/print_ibikorwa.php?act_id=<?php echo $show_activity['act_id'] ?>')"><img src="../images/icons/print.png" alt="RAPORO" width="16" height="16" class="iconspacer" /></a>          </td>
		<td class="tablerowborder"><a href="javascript:openWindow('hindura_ibikorwa.php?act_id=<?php echo $show_activity['act_id'] ?>')"> <img src="../images/icons/edit.png" alt="KOSORA" width="16" height="16" class="iconspacer" /></a>          </td>
		<td class="tablerowborder">
           <span class="smalltext"> <a href="javascript:window.location='ibigize_igikorwa.php?act_id=<?php echo $show_activity['act_id'] ?>'"><img src="../images/icons/save.png" alt="IBIGIZE IGIKORWA" width="16" height="16" class="iconspacer" /></a></span></td>
          <td class="tablerowborder"> <?php echo $show_activity['izina_rygikorwa'] ?>          </td>
            
            
            
            <td class="tablerowborder">
           <?php echo $show_activity['uwogikorewe'] ?></td>
            
            
          <td class="tablerowborder"><?php echo $show_activity['itariki_cyatangiye'] ?></td>
          <td class="tablerowborder">
		  
		  
		  <?php $umwanzuro=$show_activity['ahokigeze']; if($umwanzuro=='Ntikiratangira'){echo"<font color=red><b>$umwanzuro</b></font>"; } 
		  if($umwanzuro=='Kirigukorwa'){echo"<font color=gray><b>$umwanzuro</b></font>"; }	
		  if($umwanzuro=='Cyararangiye'){echo"<font color=green><b>$umwanzuro</b></font>"; }		  
		  ?>		    
		  
		  </td>
        </tr>
        <?php } ?>
      </table>
      <table class="fulltable">
        <tr>
          <td class="pagination"><?php if ($start > 0) { ?>
              <a href="?start=<?php echo $previous_page ?>"><img src="../images/icons/previous.png" alt="Prevous Page" width="16" height="16" class="iconspacer" /></a>
              <?php } ?>
              <?php if ($next_page < $total_records) { ?>
              <a href="?start=<?php echo $next_page ?>"><img src="../images/icons/next.png" alt="Next Page" width="16" height="16" class="iconspacer" /></a>
              <?php } ?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</body>
</html>
