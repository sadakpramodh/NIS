<?php
   session_destroy();
   // print_r($_SESSION);

   header("Location: signin.php");
?>