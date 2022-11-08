<?php
    session_start();
    // redirecting to sign in page.
    unset($_SESSION["userDetails"]);
    unset($_SESSION["isAuthenticated"]);
    header("location: ../signin.html");
?>