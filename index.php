<?php

    ob_start();
    session_start();
    require_once 'views/header.html';
    require 'views/menu.php';
    require 'views/body.php';
    require 'views/footer.php';
    
?>

