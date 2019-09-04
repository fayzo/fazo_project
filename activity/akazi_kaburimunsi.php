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

$get_company = mysqli_query($conn,"SELECT * FROM company");
$show_company = mysqli_fetch_array($get_company);


if(isset($_GET['start'])) { $start = $_GET['start']; } else { $start = 0; };
$previous_page = ($start - $_SESSION['records_per_page']);
$next_page = ($start + $_SESSION['records_per_page']);

$get_employees = mysqli_query($conn,"SELECT * FROM employees WHERE  employee_id=".$_SESSION['employee_id']."");
$show_employee = mysqli_fetch_array($get_employees);


$employee_id = mysqli_real_escape_string($conn,$_SESSION['employee_id']);

$get_akazi_kose = mysqli_query($conn,"SELECT * FROM akazi_kaburimunsi WHERE  employee_id=".$_SESSION['employee_id']."");
$total_records = mysqli_num_rows($get_akazi_kose);
$get_akazi = mysqli_query($conn,"SELECT * FROM akazi_kaburimunsi WHERE  employee_id=".$_SESSION['employee_id']." ORDER BY akazi_id DESC LIMIT $start, " . $_SESSION['records_per_page'] . "");

if(isset($_GET['query'])) {
$query = mysqli_real_escape_string($conn,$_GET['query']);
$get_akazi = mysqli_query($conn,"SELECT * FROM akazi_kaburimunsi WHERE (tariki_yakazi LIKE '%$query%') OR (umunsiwakazi LIKE '%$query%') AND employee_id=".$_SESSION['employee_id']."");
$total_records = mysqli_num_rows($conn,$get_akazi);
$next_page = $total_records;
};

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
    <form id="akazi" name="akazi" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <table class="fulltable">
        <tr>
          <td class="halftopcell"><h1>URUTONDE RWAKAZI KABURIMUNSI </h1>
            <table class="fulltable">
		   <tr>
                <td><input name="query" type="text" class="entrytext" id="query" onclick="this.value=''" value="Shakira hano" /></td>
		  </tr>
              <tr>
                <td><input name="create" type="button" class="button" id="create" onclick="window.location='andika_akazi.php'" value="ANDIKA AKAZI URIBUKORE" /></td>
              </tr>
          </table></td>
          <td class="halftopcell">&nbsp;<img src="../images/icons/activity_icon.jpg" width="134" height="137" class="iconspacer" /></td>
        </tr>
      </table>
      <table class="fulltable">
        <tr>
          <td width="8%" class="tabletop">RAPORO</td>
		  <td width="9%" class="tabletop">HINDURA / REBA</td>
          <td width="15%" class="tabletop">ITARIKI</td>
          <td width="18%" class="tabletop">UMUNSI</td>
        </tr>
        <?php while($show_akazi = mysqli_fetch_array($get_akazi)) { ?>
        
		
        <tr class="tablelist">
          <td class="tablerowborder"><a href="javascript:openWindow('../global/print_akazi.php?akazi_id=<?php echo $show_akazi['akazi_id'] ?>')"><img src="../images/icons/print.png" alt="RAPORO" width="16" height="16" class="iconspacer" /> RAPORO </a></td>
		  <td class="tablerowborder"><a href="hindura_akazi.php?akazi_id=<?php echo $show_akazi['akazi_id'] ?>"><img src="../images/icons/edit.png" alt="HINDURA" width="16" height="16" class="iconspacer" /> AKAZI</a></td>
          <td class="tablerowborder"><?php echo $show_akazi['tariki_yakazi'] ?></td>
          <td class="tablerowborder"><?php echo strtoupper($show_akazi['umunsiwakazi']) ?></td>
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
