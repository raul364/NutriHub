<?php
   session_start();
   unset($_SESSION["user"]);
   unset($_SESSION["pass"]);
   header("Location: /D:/xampp/htdocs/Nutrihub/index.html"); 
    exit;
?>