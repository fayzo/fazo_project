<?php 
if(($page_access != $_SESSION['uburenganzira_bwawe']) OR (!isset($_SESSION['employee_id']))) {
header("Location: ../restricted.php");
exit;
};

?>