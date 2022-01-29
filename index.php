<?php
session_start();


unset($_SESSION["Type"]);
if(!isset($_SESSION['Type'])) {
    $_SESSION['Type'] = null;  
}


appControler@home