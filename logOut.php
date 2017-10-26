<?php 

  session_unset();
  session_destroy();
foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
   header('Location: login_page.php');
 ?>