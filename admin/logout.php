<?php
    session_start();

    if(isset($_SESSION["admin_auth"])){
        unset($_SESSION["admin_auth"]);
        unset($_SESSION["admin_username"]);
        unset($_SESSION["admin_scratchToken"]);
    }
    session_destroy();
    header("location: ../admin/login.html");


?>