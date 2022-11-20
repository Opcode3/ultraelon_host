<?php

use app\controller\SiteController;

    session_start();
    require_once("../vendor/autoload.php");

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

    $siteController = new SiteController();

    //submit form

    if(isset($_POST["record_btn"])){
        $investor = $_POST["record_investor"];
        $deposit = $_POST["record_deposit"];
        $withdraw = $_POST["record_withdraw"];

        $payload = array(
            "investor" => $investor, "deposit" => $deposit, "withdrawal" => $withdraw,
            "id" => 1
        );

        $updateRecord = json_decode($siteController->setRecord($payload), true);
        echo "<script> alert('".$updateRecord['message']."'); </script>";
    }


    if(isset($_POST["btnContact"])){
        $address = $_POST["contact_address"];
        $email = $_POST["contact_email"];
        $whatsapp = $_POST["contact_whatsapp"];

        $payload = array(
            "address" => $address, "email" => $email, "whatsapp" => $whatsapp,
            "id" => 1
        );
        $updateRecord = json_decode($siteController->setContact($payload), true);
        echo "<script> alert('".$updateRecord['message']."'); </script>";
    }

    if(isset($_POST["btnFAQ"])){

        $faqTitle = $_POST["faqTitle"];
        $faqContent = $_POST["faqContent"];


        $payload = array("title" => $faqTitle, "content"=> $faqContent, "affiliate" => 0);

        if(isset($_POST["isAffiliate"]) && strlen(trim($_POST["isAffiliate"])) > 0){
            $payload["affiliate"] = 1;   
        }
        $newFaq = json_decode($siteController->setFaq($payload), true);
        echo "<script> alert('".$newFaq['message']."'); </script>";
    }

    if(isset($_POST["statistic_btn"])){
        
        $type = $_POST["statistic_type"];
        $wallet = $_POST["statistic_wallet"];
        $amount = $_POST["statistic_amount"];
        $name = $_POST["statistic_name"];

        $payload = array(
            "type" => $type, "wallet_type"=> $wallet, "amount" => $amount,
            "investor_name" => $name
        );
        $newStatistic = json_decode($siteController->setStatistic($payload), true);
        echo "<script> alert('".$newStatistic['message']."'); </script>";
    }

    if(isset($_POST["btnTestimony"])){
        
        $country = $_POST["test_country"];
        $name = $_POST["test_name"];
        $message = $_POST["test_message"];

        $payload = array( 
            "message" => $message, "name"=> $name, "country" => $country
        );
        $newTestimony = json_decode($siteController->setTestimony($payload), true);
        echo "<script> alert('".$newTestimony['message']."'); </script>";
    }

    

    // // Records
    $recordResponse = json_decode($siteController->getRecord(), true);
    $contactResponse = json_decode($siteController->getContact(), true);
    
    $investorRecord = $recordResponse["message"]["record_investor"];
    $depositRecord = $recordResponse["message"]["record_deposit"];
    $withdrawRecord = $recordResponse["message"]["record_withdrawal"];

    $contactAddress = $contactResponse["message"]["contact_address"];
    $contactEmail = $contactResponse["message"]["contact_email"];
    $contactWhatsapp = $contactResponse["message"]["contact_whatsapp"];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Site Information - UltraElon Investment Platform</title>
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
                            <a href="./investment.php">
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
                            <a href="./site.php" class="active">
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
                    <span> Welcome Back👋🏾  </span>
                    <h2>Exploring Basic Site Information</h2>
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
                <div id="settingFrame">
                    <div id="navigator">
                        <a href="./siteview.php">View Site Setting</a>
                    </div>
                    <div class="item">
                        <a href="./site.php?tab=home" class="itemHeader">Home Page</a>
                        <?php
                            if(isset($_GET["tab"]) && $_GET["tab"] == "home"){
                        ?>
                        <div class="itemContent">
                            <h3>Our Total Records::</h3>
                            <form method="post" id="total">
                                <div class="formControl">
                                    <label for="investor">Total Investors</label>
                                    <input type="number" required value="<?php echo $investorRecord; ?>" name="record_investor" placeholder="Enter total investors" id="investor">
                                </div>
                                <div class="formControl">
                                    <label for="deposits">Total Deposits</label>
                                    <input type="number" required value="<?php echo $depositRecord; ?>" name="record_deposit" placeholder="Enter total deposits" id="deposits">
                                </div>
                                <div class="formControl">
                                    <label for="withdrawals">Total Withdrawal</label>
                                    <input type="number" required value="<?php echo $withdrawRecord; ?>" name="record_withdraw" placeholder="Enter total withdrawals" id="withdrawals">
                                </div>
                                <div class="formControl">
                                    <button type="submit" name="record_btn">Submit Totals</button>
                                </div>
                            </form>
                            <h3>Our Statistics::</h3>
                            <form method="post" id="statistics">
                                <div class="formControl">
                                    <label for="type">Select Statistic Type</label>
                                    <select name="statistic_type" id="type">
                                        <option value="deposit">Latest Deposit</option>
                                        <option value="withdrawal">Latest Withdrawal</option>
                                    </select>
                                </div>
                                <div class="formControl">
                                    <label for="wallet">Select Wallet Type</label>
                                    <select name="statistic_wallet" id="wallet">
                                        <option value="bitcoin">Bitcoin</option>
                                        <option value="eth">Ethereum</option>
                                        <option value="bnb">BNB</option>
                                        <option value="usdt">USDT</option>
                                        <option value="ultra">Ultra</option>
                                    </select>
                                </div>
                                <div class="formControl">
                                    <label for="amount">Amount</label>
                                    <input type="number" required min="10" name="statistic_amount" placeholder="Enter amount invested" id="amount">
                                </div>
                                <div class="formControl">
                                    <label for="name">Investors Name</label>
                                    <input type="text" name="statistic_name" minlength="3" required placeholder="Enter investors name" id="name">
                                </div>
                                <div class="formControl">
                                    <button type="submit" name="statistic_btn">Submit Totals</button>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="item">
                        <a href="./site.php?tab=faqs" class="itemHeader">FAQs Widgets</a>
                        <?php
                            if(isset($_GET["tab"]) && $_GET["tab"] == "faqs"){
                        ?>
                        <div class="itemContent">
                            <form method="post" id="faqForm">
                                <div class="formControl">
                                    <label for="isAffiliate" id="affiliate">
                                        <input type="checkbox" name="isAffiliate" placeholder="Enter total investors" id="isAffiliate">
                                        Is the content relating to affiliate?
                                    </label>
                                </div>
                                <div class="formControl">
                                    <label for="faqTitle">FAQ Title</label>
                                    <input type="text" required minlength="6" name="faqTitle" placeholder="Enter FAQ Title" id="faqTitle">
                                </div>
                                <div class="formControl">
                                    <label for="faqContent">FAQ Content</label>
                                    <textarea name="faqContent" required minlength="10" id="faqContent" placeholder="Main FAQ Content " cols="30" rows="5"></textarea>
                                </div>
                                <div class="formControl">
                                    <button type="submit" name="btnFAQ">Submit FAQs</button>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="item">
                        <a href="./site.php?tab=contact" class="itemHeader">Our Contacts</a>
                        <?php
                            if(isset($_GET["tab"]) && $_GET["tab"] == "contact"){
                        ?>
                        <div class="itemContent">
                        <form method="post" id="contact">
                                <div class="formControl">
                                    <label for="address">Address</label>
                                    <input type="text" value="<?php echo $contactAddress; ?>" name="contact_address" placeholder="Enter Contact Address" id="address">
                                </div>
                                <div class="formControl">
                                    <label for="email">Email</label>
                                    <input type="email" value="<?php echo $contactEmail; ?>" name="contact_email" placeholder="Enter Contact Email" id="email">
                                </div>
                                <div class="formControl">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text" value="<?php echo $contactWhatsapp; ?>" name="contact_whatsapp" placeholder="Enter Whatsapp contact" id="whatsapp">
                                </div>
                                <div class="formControl">
                                    <button type="submit" name="btnContact">Submit Contact</button>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="item">
                        <a href="./site.php?tab=testimony" class="itemHeader">Testimonial</a>
                        <?php
                            if((isset($_GET["tab"]) && $_GET["tab"] == "testimony") || !isset($_GET["tab"])){
                        ?>
                        <div class="itemContent">
                            <form method="post" id="testimonial">
                                <div class="formControl">
                                    <label for="test_country">Investor Province/Country</label>
                                    <input type="text" name="test_country" required placeholder="Enter Investor Province" id="test_country">
                                </div>
                                <div class="formControl">
                                    <label for="test_name">Investor Name</label>
                                    <input type="text" name="test_name" required placeholder="Enter Investor Name" id="test_name">
                                </div>
                                <div class="formControl">
                                    <label for="test_message">Message</label>
                                    <textarea name="test_message" required minlength="10" id="test_message" placeholder="Testimonial message " rows="6"></textarea>
                                </div>
                                <div class="formControl">
                                    <button type="submit" name="btnTestimony">Submit Testimonial</button>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Ensure that you are filling the correct and up-to-date information. -->
    <script src="./assets/js/main.js"></script>
</body>
</html>