<?php
   session_start();
   unset($_SESSION["userid"]);
   unset($_SESSION["password"]);
   unset($_SESSION["name"]);
   
   echo 'Loging out...........';
   header('Refresh: 2; URL = index.php');
?>