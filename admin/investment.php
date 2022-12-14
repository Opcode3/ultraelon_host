<?php

use app\controller\InvestmentController;

    session_start();

    if(
        !(
        
            isset($_SESSION["admin_auth"]) && is_bool($_SESSION["admin_auth"]) &&
            isset($_SESSION["admin_username"]) && strlen(trim($_SESSION["admin_username"])) > 6 &&
            isset($_SESSION["admin_scratchToken"]) && strlen(trim($_SESSION["admin_scratchToken"])) > 12
        )
    ){
        session_destroy();
        header("location: ./login.html");
    }

    require_once("../vendor/autoload.php");

    $investmentController = new InvestmentController();
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Investment - UltraElon Investment Platform</title>
    <link rel="stylesheet" href="./assets/style/main.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <aside>
            <div id="asideHolder">
                <div class="logo">
                    <img src="../assets/img/ultraelon.png" alt="UltraElon" srcset="../assets/img/ultraelon.png">

                    <span id="btnCloseHandBurger">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </span>
                </div>

    
                <nav>
                    <span>menu</span>
                    <ul>
                        <li>
                            <a href="./">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="./investment.php" class="active">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                <span> Investment</span>
                            </a>
                        </li>
                        <li>
                            <a href="./withdrawal.php">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <span> Withdrawals</span>
                            </a>
                        </li>
                        <li>
                            <a href="./referral.php">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                <span> Referrals</span>
                            </a>
                        </li>
                        <li>
                            <a href="./wallet.php">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <span> Wallets</span>
                            </a>
                        </li>

                        <li>
                            <a href="./support.php">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                <span> Supports</span>
                            </a>
                        </li>
                        <li>
                            <a href="./site.php">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                <span> Site Settings</span>
                            </a>
                        </li>

                    </ul>
                </nav>
    
                <div class="goOff">
                    <ul>
                        <li>
                            <a href="./logout.php">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <main>
            <nav>
                <div class="imgCover">
                    <img src="../assets/img/ultraelon.png" alt="logo" srcset="../assets/img/ultraelon.png">
                </div>
                <button id="handBurger">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </nav>
            <menu>
                <div id="title">
                    <span> Welcome Back????????  </span>
                    <h2>Exploring Investment</h2>
                </div>
                <div id="profiling">
                    <span>
                        <img src="./assets/images/profile.png" alt="Its Nora">
                    </span>
                    <a href="./logout.php">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </a>
                </div>
            </menu>

            <div class="mainContainer">
                <div id="investmentFrame">
                    <?php
                        $page = "investPending";
                        if(isset($_GET["page"])){
                            if($_GET["page"] == 0){
                                $page = "investPaid";
                            }else if($_GET["page"] == 1){
                                $page = "investClose";
                            }
                        }
                        include_once("./includes/$page.php")
                    ?>
                </div>
            </div>
        </main>
    </div>

    <!-- Ensure that you are filling the correct and up-to-date information. -->
    <script src="./assets/js/main.js"></script>
</body>
</html>