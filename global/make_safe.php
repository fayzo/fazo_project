<?php
$user_input_data = array();

foreach($_POST as $input => $user_input_data){ $_POST[$input] =mysqli_real_escape_string($conn,trim($user_input_data)); }
?>