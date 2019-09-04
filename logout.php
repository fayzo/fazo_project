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
include("inc/dbconfig.php");


session_start();
session_destroy();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<title><?php include("title.php");?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="smallwrap">
  <div id="header">
    <h2>Murakoze,</h2>
    <h2> Ubu umaze gusohoka muri sisiteme.<br />
	Mugire ibihe byiza</h2>
  </div>
  <div id="content">
    <form id="form1" name="form1" method="post" action="">
      <input name="login" type="button" class="button" id="login" onclick="window.location='index.php'" value="INJIRA NANONE" />
    </form>
  </div>
</div>
</body>
</html>
