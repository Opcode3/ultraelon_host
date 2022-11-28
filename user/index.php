<?php

require_once("../vendor/autoload.php");

use app\controller\WalletController;

    session_start();
    // var_dump($_SESSION);
    $walletId = (int) $_SESSION["userDetails"]["user_id"];

    if(
        !(isset($_SESSION["isAuthenticated"]) && is_bool($_SESSION["isAuthenticated"])
        && $_SESSION["isAuthenticated"] == true && isset($_SESSION["userDetails"]) 
        && count($_SESSION["userDetails"]) == 12 && $walletId > 0)
    ){
        session_destroy();
        header("location: ../signin.html");
    }
    $page = isset($_GET["page"]) ? $_GET["page"] : "";
    switch ($page) {
        case 'invest':
            $page = 1;
            break;
        case 'withdraw':
            $page = 2;
            break;
        case 'referrals':
            $page = 3;
            break;
        case 'settings':
            $page = 4;
            break;
        default:
            $page = 0;
            break;
    }

    // always sync db for current wallet details
    if(isset($_SESSION["wallet_invests"]) == false){
        $walletController = new WalletController();
        if($walletId > 0){
            $walletResponse = json_decode($walletController->getUserWalletAmount($walletId), true);
            $_SESSION["wallet_invest"] = $walletResponse["message"]["wallet_invest"];
            $_SESSION["wallet_referral"] = $walletResponse["message"]["wallet_referral"];
            $_SESSION["wallet_ultra"] = $walletResponse["message"]["wallet_ultra"];
        }
    
        // var_dump($walletResponse["message"]);
    }
    

    $username = $_SESSION["userDetails"]["user_username"];
    $user_id = $_SESSION["userDetails"]["user_id"];
    $email = $_SESSION["userDetails"]["user_email"];
    $passwordHash = $_SESSION["userDetails"]["user_password"];
    $slug = $_SESSION["userDetails"]["user_slug"];
    $createdAt = $_SESSION["userDetails"]["createdAt"];
    $updatedAt = $_SESSION["userDetails"]["updatedAt"];
    $bitcoin = $_SESSION["userDetails"]["user_bitcoin"];
    $eth = $_SESSION["userDetails"]["user_eth"];
    $bnb = $_SESSION["userDetails"]["user_bnb"];
    $ultra = $_SESSION["userDetails"]["user_ultra"];
    $usdt = $_SESSION["userDetails"]["user_usdt"];
    $walletROI = $_SESSION["wallet_invest"];
    $walletUltra = $_SESSION["wallet_ultra"];
    $walletReferral = $_SESSION["wallet_referral"];
    // $email = 
    // var_dump($_SESSION["userDetails"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username."'s"; ?> dashboard - Ultraelon Investment Platform</title>
    <link rel="stylesheet" href="./assets/styles/main.css">
    <link rel="stylesheet" href="./assets/styles/content.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

</head>
<body>
    <div class="container">
        <aside>
            <div class="logo">
                <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg" class="logotype-icon"><path d="M0 22.5C0 14.0885 0 9.88269 1.80866 6.75C2.99353 4.69774 4.69774 2.99353 6.75 1.80866C9.88269 0 14.0885 0 22.5 0C30.9115 0 35.1173 0 38.25 1.80866C40.3023 2.99353 42.0065 4.69774 43.1913 6.75C45 9.88269 45 14.0885 45 22.5C45 30.9115 45 35.1173 43.1913 38.25C42.0065 40.3023 40.3023 42.0065 38.25 43.1913C35.1173 45 30.9115 45 22.5 45C14.0885 45 9.88269 45 6.75 43.1913C4.69774 42.0065 2.99353 40.3023 1.80866 38.25C0 35.1173 0 30.9115 0 22.5Z" fill="#896ae2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 23.0153V14.55H16.1999V23.0813C16.2107 25.2345 16.8352 26.683 17.8685 27.6882C18.927 28.7069 20.3406 29.2962 22.4999 29.2962C24.6639 29.2962 26.0927 28.7043 27.1484 27.6881C28.1729 26.6914 28.7999 25.2274 28.7999 23.0153V14.55H32.9999V23.0153C32.9999 26.0542 32.0991 28.7012 30.0818 30.661C28.0941 32.5764 25.5357 33.45 22.4999 33.45C19.4597 33.45 16.9201 32.5738 14.9351 30.6609C12.9279 28.7111 12.0134 26.018 11.9999 23.0153ZM24.5999 22.8578V14.55H20.3999V22.8809C20.4034 23.6644 20.6116 24.1913 20.9561 24.557C21.3089 24.9274 21.7801 25.1417 22.4999 25.1417C23.2213 25.1417 23.6975 24.9265 24.0494 24.557C24.3909 24.1945 24.5999 23.6622 24.5999 22.8578Z" fill="#fff"></path></svg>
            </div>
            <ul>
                <li> 
                    <a href="./" class="<?php echo $page == 0 ? 'active' : ''; ?> ">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span>overview</span>
                    </a>
                </li>
                <li> 
                    <a href="./?page=invest" class="<?php echo $page == 1 ? 'active' : ''; ?>">
                        <svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        <span>Invest</span>
                    </a>
                </li>
                <li> 
                    <a href="./?page=withdraw" class="<?php echo $page == 2 ? 'active' : ''; ?>">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span>available withdrawals</span>
                    </a>
                </li>
                <li> 
                    <a href="./?page=referrals" class="<?php echo $page == 3 ? 'active' : ''; ?>">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span>Referrals</span>
                    </a>
                </li>
                <li> 
                    <a href="./?page=settings" class="<?php echo $page == 4 ? 'active' : ''; ?>">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>settings</span>
                    </a>
                </li>

                <li> 
                    <a href="./logout.php">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>logout</span>
                    </a>
                </li>
                
            </ul>
        </aside>

        <main>
            <header>

                <div>
                    <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg" class="logotype-icon"><path d="M0 22.5C0 14.0885 0 9.88269 1.80866 6.75C2.99353 4.69774 4.69774 2.99353 6.75 1.80866C9.88269 0 14.0885 0 22.5 0C30.9115 0 35.1173 0 38.25 1.80866C40.3023 2.99353 42.0065 4.69774 43.1913 6.75C45 9.88269 45 14.0885 45 22.5C45 30.9115 45 35.1173 43.1913 38.25C42.0065 40.3023 40.3023 42.0065 38.25 43.1913C35.1173 45 30.9115 45 22.5 45C14.0885 45 9.88269 45 6.75 43.1913C4.69774 42.0065 2.99353 40.3023 1.80866 38.25C0 35.1173 0 30.9115 0 22.5Z" fill="#896ae2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 23.0153V14.55H16.1999V23.0813C16.2107 25.2345 16.8352 26.683 17.8685 27.6882C18.927 28.7069 20.3406 29.2962 22.4999 29.2962C24.6639 29.2962 26.0927 28.7043 27.1484 27.6881C28.1729 26.6914 28.7999 25.2274 28.7999 23.0153V14.55H32.9999V23.0153C32.9999 26.0542 32.0991 28.7012 30.0818 30.661C28.0941 32.5764 25.5357 33.45 22.4999 33.45C19.4597 33.45 16.9201 32.5738 14.9351 30.6609C12.9279 28.7111 12.0134 26.018 11.9999 23.0153ZM24.5999 22.8578V14.55H20.3999V22.8809C20.4034 23.6644 20.6116 24.1913 20.9561 24.557C21.3089 24.9274 21.7801 25.1417 22.4999 25.1417C23.2213 25.1417 23.6975 24.9265 24.0494 24.557C24.3909 24.1945 24.5999 23.6622 24.5999 22.8578Z" fill="#fff"></path></svg>
                    <h3>Hola <?php echo $username; ?>👋🏾 </h3>
                </div>
                <div>
                    <a href="./logout.php">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </a>
                </div>
            </header>
            <div id="content">
                <?php
                    $include_page = "index";
                    if($page == 1) $include_page = "invest";
                    if($page == 2) $include_page = "withdraw";
                    if($page == 3) $include_page = "referral";
                    if($page == 4) $include_page = "setting";

                    require_once("includes/$include_page.php")
                ?>
                <!-- <footer> 
                    <script>
                        const date = new Date();
                        document.write(`CopyRight © ${date.getFullYear()} Ultraelon Investment Platform. All Rights Reserved.`)
                    </script>
                </footer> -->
            </div>
        </main>
    </div>
    <div id="modal" class="hideModal">
        <!-- <div class="modalCover">  -->
            <div class="coverFrame">
                <div class="modalHeader">
                    <h2 id="modelSubtitle"></h2>
                    <!-- <h2></h2> -->
                    <svg id="modalCancelBtn" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
                <div id="modalInclude">
                    <?php
                        if(isset($_GET["page"]) && $_GET["page"] == "invest"){
                    ?>
                        <div id="modalInvest">
                            <?php include_once("./modal/invest.php"); ?>
                        </div>
                    <?php
                        }else if(isset($_GET["page"]) && $_GET["page"] == "withdraw"){
                    ?>
                        <div id="modalWithdraw">
                            <?php include_once("./modal/withdraw.php"); ?>
                        </div>
                    <?php
                        }
                    ?>
                    <div id="modalInvestPro">
                        <?php include_once("./modal/proInvest.php"); ?>
                    </div>

                </div>
            </div>
        <!-- </div> -->
    </div>

    <script src="./assets/js/main.js"></script>
</body>
</html>