<?php
    session_start();
    // redirecting to sign in page.
    unset($_SESSION["userDetails"]);
    unset($_SESSION["isAuthenticated"]);
    unset($_SESSION["wallet_invest"]);
    // session_destroy();
    header("location: ../signin.html");
?>