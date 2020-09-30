<?php
    session_start();
   
    define('TITLE','NIS');
    
    if(!isset($_SESSION['userId']))
    {
      header("Location: signin.php");
    }
?>