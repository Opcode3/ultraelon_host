<!DOCTYPE html>
<html lang="en">
    <?php


        use app\controller\SiteController;

        $title = "Home";
        require_once("./include/header.inc.php");
        require_once("./vendor/autoload.php");
        $siteController = new SiteController();

        $recordResponse = json_decode($siteController->getRecord(), true);
        $depositResponse = json_decode($siteController->getDepositStatistics(), true);
        $withdrawResponse = json_decode($siteController->getWithdrawStatistics(), true);
        $investorRecord = $recordResponse["message"]["record_investor"];
        $depositRecord = $recordResponse["message"]["record_deposit"];
        $withdrawRecord = $recordResponse["message"]["record_withdrawal"];

        // $investorRecord = 209;
        // $depositRecord = 5940.89;
        // $withdrawRecord = 409322.90;

        // print_r($statisticResponse);
        // var_dump($recordResponse);

    ?>
    <main>
        <!-- slideshow content begin -->
        <div  class="uk-section uk-padding-remove-vertical in-slideshow-gradient">
            <div id="particles-js" class="uk-light in-slideshow uk-background-contain" data-src="assets/img/in-equity-14-bg.svg" data-uk-img data-uk-slideshow>
                <hr>
                <ul class="uk-slideshow-items">
                    <li class="uk-flex uk-flex-middle">
                        <div class="uk-container">
                            <div class="uk-grid-large uk-flex-middle" data-uk-grid>
                                <div class="uk-width-1-2@s in-slide-text">
                                    <!-- <p class="in-badge-text uk-text-small uk-margin-remove-bottom uk-visible@m"><span class="uk-label uk-label-success in-label-small">New</span>Tradeing platforms.</p> -->
                                    <h1 class="uk-heading-small uk-text-uppercase uk-text-bold">Your trust for a stable investment.</h1>
                                    <!-- <h1 class="uk-heading-small">Your number cryptocurrency trading platform that's trusted on <span class="in-highlight">stable investment</span>.</h1> -->
                                    <p class="uk-text-lead uk-visible@m">
                                        ULTRAELON is an African based international financial company engaged in investment
                                        activities, which are related to trading on financial markets and cryptocurrency exchanges
                                        performed by qualified professional traders.
                                    </p>
                                        <!-- Get the most accurate market data, alerts, conversions, tools and more — all within the same app.</p> -->
                                    <div class="uk-grid-medium uk-child-width-auto uk-margin-medium-top uk-visible@s" data-uk-grid data-market="TSLA,GOOGL,AAPL">
                                        <div>
                                            <a href="./register.php" class="uk-card uk-card-small uk-card-secondary uk-card-body uk-border-rounded uk-flex">
                                                <h3 class="uk-text-default">Create an account <i class="fas fa-arrow-circle-right uk-margin-small-left"></i></h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="in-slide-img">
                                    <img src="assets/img/in-lazy.gif" data-src="assets/header-06.png" alt="image-slide" data-uk-img>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="uk-container">
                    <div class="uk-position-relative" data-uk-grid>
                        <ul class="uk-slideshow-nav uk-dotnav uk-position-bottom-right uk-flex uk-flex-middle"></ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- slideshow content end -->
        <!-- section content begin -->
        <div class="uk-section in-equity-7 uk-background-contain uk-background-top-left" data-src="assets/img/in-equity-7-bg.jpg" data-uk-img>
            <div class="uk-container uk-margin-medium-top uk-margin-bottom">
                <div class="uk-grid">
                    <div class="uk-width-1-2@m in-symbol-wrap">
                        <div class="uk-inline uk-dark uk-width-1-1 uk-height-1-1">
                            <span class="uk-position-absolute uk-transform-center in-symbol-1" style="left: 12%; top: 42%">
                                <img src="./assets/icons/bitcoin.svg" alt="symbol-logo">
                            </span>
                            <span class="uk-position-absolute uk-transform-center in-symbol-2" style="left: 58%; top: 18%">
                                <img src="./assets/icons/eth.svg" alt="symbol-logo">
                            </span>
                            <span class="uk-position-absolute uk-transform-center in-symbol-3" style="left: 22%; top: 13%">
                                <img src="./assets/icons/bnb.svg" alt="symbol-logo">
                            </span>
                            <span class="uk-position-absolute uk-transform-center in-symbol-4" style="left: 70%; top: 60%">
                                <img src="./assets/icons/usdt.svg" alt="symbol-logo">
                            </span>
                            <span class="uk-position-absolute uk-transform-center in-symbol-5" style="left: 10%; top: 38%"></span>
                            <span class="uk-position-absolute uk-transform-center in-symbol-6" style="left: 52%; top: 6%"></span>
                            <span class="uk-position-absolute uk-transform-center in-symbol-7" style="left: 70%; top: 89%"></span>
                            <span class="uk-position-absolute uk-transform-center in-symbol-8" style="left: 32%; top: 97%"></span>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-bottom">
                        <a href="./about.php" class="uk-label">Read about us<i class="fas fa-arrow-right fa-xs uk-margin-small-left"></i></a>
                        <h1 class="uk-margin-top">Trade with <span class="in-highlight">confidence</span></h1>
                        <p class="uk-text-lead uk-margin-top">
                        UltraElon investment plans have a high daily return on investment. Our fund is managed by experienced professionals from around the world, and we invest in lucrative markets such as Gold, oil, and forex, bonds, stock exchange and crypto.</p>
                        <div class="uk-grid-medium uk-child-width-1-2@m uk-child-width-1-2@s uk-margin-medium-top" data-uk-grid>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium uk-text-center">
                                    <img class="uk-align-center" src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-7-icon-1.svg" alt="icon-1" data-width data-height data-uk-img>
                                    <h4 class="uk-margin-remove">First Goal</h4>
                                    <p class="uk-margin-small-top uk-margin-small-bottom">
                                    In association with the ultra-token platform; How goal is to make trading, profitable for newbies and the long term traders.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium uk-text-center">
                                    <img class="uk-align-center" src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-7-icon-2.svg" alt="icon-2" data-width data-height data-uk-img>
                                    <h4 class="uk-margin-remove">Second Goal</h4>
                                    <p class="uk-margin-small-top uk-margin-small-bottom">
                                        <!-- One of our most adhered goal is  -->
                                        To see that our investors gain quick and instant access to their funds; using our automated blockchain payment system.
                                    </p>
                                    <!-- <a href="#" class="uk-button uk-button-text uk-margin-top uk-margin-small-bottom">Learn more<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <!-- See Accounts Investment Plans -->
        <!-- <div class="uk-section in-equity-17">
            <div class="uk-container uk-margin-top uk-margin-medium-bottom">
                <div class="uk-grid uk-grid-collapsed uk-flex uk-flex-center">
                    <div class="uk-width-3-5@m uk-text-center">
                        <h1 class="uk-margin-remove">Choose your <span class="in-highlight">Investmen</span> plan</h1>
                        <p class="uk-text-lead uk-text-muted uk-margin-small-top">Simply select your preferred investment plan and grow your account.</p>
                    </div>
                    <div class="uk-width-1-1 uk-margin-medium-top">
                        <div class="uk-grid-small uk-child-width-1-2@s  uk-child-width-1-3@l in-equity-pricing" data-uk-grid>
                            
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimum funding<span class="uk-label uk-margin-small-left in-label-small">USD 200</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Classic account</h2>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Benefit from industry-leading entry prices</p>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <li>One of the established industry leaders</li>
                                        <li>Three decades of trading know-how</li>
                                        <li>Award-winning customer service*</li>
                                        <li>Highly-regarded trader education*</li>
                                        <li>Advanced risk management</li>
                                        <li>Tax-free spread betting profits</li>
                                        <li>Low minimum deposit</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-align-center">Open an account<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimum funding<span class="uk-label uk-margin-small-left in-label-small">USD 500</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Platinum account</h2>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Receive even tighter spreads and commissions</p>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <li>Award-winning trading platform*</li>
                                        <li>Wide range of charting tools</li>
                                        <li>Fast, automated excecution</li>
                                        <li>Expert news & analysis</li>
                                        <li>Competitive spreads</li>
                                        <li>Advanced trading tools</li>
                                        <li>Tax-free spread betting profits</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-align-center">Open an account<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimum funding<span class="uk-label uk-margin-small-left in-label-small">USD 500</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Platinum account</h2>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Receive even tighter spreads and commissions</p>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <li>Award-winning trading platform*</li>
                                        <li>Wide range of charting tools</li>
                                        <li>Fast, automated excecution</li>
                                        <li>Expert news & analysis</li>
                                        <li>Competitive spreads</li>
                                        <li>Advanced trading tools</li>
                                        <li>Tax-free spread betting profits</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-align-center">Open an account<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimum funding<span class="uk-label uk-margin-small-left in-label-small">USD 200</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Classic account</h2>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Benefit from industry-leading entry prices</p>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <li>One of the established industry leaders</li>
                                        <li>Three decades of trading know-how</li>
                                        <li>Award-winning customer service*</li>
                                        <li>Highly-regarded trader education*</li>
                                        <li>Advanced risk management</li>
                                        <li>Tax-free spread betting profits</li>
                                        <li>Low minimum deposit</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="uk-section in-equity-17">
            <div class="uk-container uk-margin-top uk-margin-medium-bottom">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-5@m uk-text-center">
                        <h1 class="uk-margin-remove">Today's <span class="in-highlight">Cryptocurrency Prices</span></h1>
                        <p class="uk-text-lead uk-text-muted uk-margin-small-top">Use the today's Cryptocurrency Pricing list by Market Cap to choose your investment plan.</p>
                    </div>
                    <div class="uk-width-1-1 uk-margin-medium-top">
                        <div class="uk-flex-collapse in-equity-pricing uk-grid" data-uk-flex="">
                            <div class="uk-width-1-1">
                                <coingecko-coin-list-widget  coin-ids="bitcoin,ethereum,binancecoin,ultra,tether,dogecoin,eos,litecoin,ripple" currency="usd" locale="en"></coingecko-coin-list-widget>
                            </div>
                            <!-- <div class="uk-width-1-1">
                                <iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


       
        <!-- section content begin -->
        <div class="uk-section uk-section-secondary in-equity-8">
            <div class="uk-container uk-padding-remove uk-margin-medium-top uk-margin-medium-bottom">
                <div class="uk-grid uk-margin-remove uk-padding-remove-right uk-flex-center">
                    <div class="uk-width-1-1 uk-grid uk-text-center">
                        <div class="uk-width-1-1 uk-text-center">
                            <h1>Our Investment <span class="in-highlight">Statistics</span></h1>
                            <p class="uk-text-lead uk-margin-medium-bottom">Below are our current statistics on our most active deposit and withdrawal.</p>
                        </div>
                        <div class="uk-width-1-2@m  uk-card uk-card-body uk-border-rounded uk-box-shadow-large">
                            <div class="uk-overflow-auto">
                                <table class="uk-table">
                                    <thead>
                                        <tr>
                                            <th class="tableHead" colspan="3"> <span class="uk-text-large in-highlight">Our Latest Deposit</span> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody" id="depositStatistic">
                                        <?php
                                            if(is_array($depositResponse["message"]) && count($depositResponse["message"]) > 0){
                                                foreach($depositResponse["message"] as $key => $value){
                                                    ?>
                                                     <tr>
                                                        <?php
                                                            if($value["statistic_wallet_type"] == "bitcoin"){
                                                                echo "<td><span class='in-icon icon-btc'>BTC</span></td>";
                                                            }else if($value["statistic_wallet_type"] == "eth"){
                                                                echo "<td><span class='in-icon icon-eth'>ETH</span></td>";
                                                            }else if($value["statistic_wallet_type"] == "bnb"){
                                                                echo "<td><span class='in-icon icon-bnb'>BNB</span></td>";
                                                            }else if($value["statistic_wallet_type"] == "usdt"){
                                                                echo "<td><span class='in-icon icon-usdt'>USDT</span></td>";
                                                            }else if($value["statistic_wallet_type"] == "ultra"){
                                                                echo "<td><span class='in-icon icon-ultra'>Ultra Token</span></td>";
                                                            }
                                                        ?>
                                                        <td><?php echo "$".$value["statistic_amount"]; ?></td>
                                                        <td><?php echo $value["statistic_investor_name"]; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }else{
                                        ?>
                                        <tr>
                                            <td><span class="in-icon icon-btc">BTC</span></td>
                                            <td>$3,500</td>
                                            <td>Bolbina Jesse</td>
                                        </tr>
                                        <tr>
                                            <td><span class="in-icon icon-eth">ETH</span></td>
                                            <td>$500</td>
                                            <td>Bolbina Jesse</td>
                                        </tr>
                                        <tr>
                                            <td><span class="in-icon icon-bnb">BNB</span></td>
                                            <td>$35</td>
                                            <td>Bolbina Jesse</td>
                                        </tr>
                                        <tr>
                                            <td><span class="in-icon icon-usdt">USDT</span></td>
                                            <td>$15</td>
                                            <td>Bolbina Jesse</td>
                                        </tr>
                                        <tr>
                                            <td><span class="in-icon icon-ultra">Ultra Token</span></td>
                                            <td>$25</td>
                                            <td>Bolbina Jesse</td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-width-1-2@m uk-margin-large-top uk-margin-remove-top uk-card uk-card-body uk-border-rounded uk-box-shadow-large">
                            <div class="uk-overflow-auto">
                                    <table class="uk-table">
                                        <thead>
                                            <tr>
                                                <th class="tableHead" colspan="4"> <span class="uk-text-large in-highlight">Our Latest Withdrawals</span> </th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody" id="withdrawStatistic">
                                        <?php
                                            if(is_array($withdrawResponse["message"]) && count($withdrawResponse["message"]) > 0){
                                                foreach($withdrawResponse["message"] as $key => $value){
                                                    ?>
                                                     <tr>
                                                        <?php
                                                            if($value["statistic_wallet_type"] == "bitcoin"){
                                                                echo "<td><span class='in-icon icon-btc'>BTC</span></td>";
                                                            }else if($value["statistic_wallet_type"] == "eth"){
                                                                echo "<td><span class='in-icon icon-eth'>ETH</span></td>";
                                                            }else if($value["statistic_wallet_type"] == "bnb"){
                                                                echo "<td><span class='in-icon icon-bnb'>BNB</span></td>";
                                                            }else if($value["statistic_wallet_type"] == "usdt"){
                                                                echo "<td><span class='in-icon icon-usdt'>USDT</span></td>";
                                                            }else if($value["statistic_wallet_type"] == "ultra"){
                                                                echo "<td><span class='in-icon icon-ultra'>Ultra Token</span></td>";
                                                            }
                                                        ?>
                                                        <td><?php echo "$".$value["statistic_amount"]; ?></td>
                                                        <td><?php echo $value["statistic_investor_name"]; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }else{
                                        ?>
                                            <tr>
                                                <td><span class="in-icon icon-btc">BTC</span></td>
                                                <td>$3,500</td>
                                                <td>Bolbina Jesse</td>
                                            </tr>
                                            <tr>
                                                <td><span class="in-icon icon-eth">ETH</span></td>
                                                <td>$500</td>
                                                <td>Bolbina Jesse</td>
                                            </tr>
                                            <tr>
                                                <td><span class="in-icon icon-bnb">BNB</span></td>
                                                <td>$35</td>
                                                <td>Bolbina Jesse</td>
                                            </tr>
                                            <tr>
                                                <td><span class="in-icon icon-usdt">USDT</span></td>
                                                <td>$15</td>
                                                <td>Bolbina Jesse</td>
                                            </tr>
                                            <tr>
                                                <td><span class="in-icon icon-ultra">Ultra Token</span></td>
                                                <td>$25</td>
                                                <td>Bolbina Jesse</td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section in-equity-9">
            <div class="uk-container uk-margin-medium-top uk-margin-bottom">
                
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-4@m uk-margin-top">
                        <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center in-register" data-uk-grid>
                            <div class="uk-width-1-1 in-h-line">
                                <h2>Getting started is easy</h2>
                            </div>
                            <div>
                                <span class="in-icon-wrap circle">1</span>
                                <p>Choose an investment plan and register</p>
                            </div>
                            <div>
                                <span class="in-icon-wrap circle">2</span>
                                <p>Make payment to the specified address and wait for the duration period.</p>
                            </div>
                            <div>
                                <span class="in-icon-wrap circle">3</span>
                                <p>Withdraw your capital by applying from your dashboard using our automated blockchain payment system.</p>
                            </div>
                            <div class="uk-width-1-1">
                                <a href="./register.php" class="uk-button uk-button-text">create an account<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section in-equity-5">
            <div class="uk-container uk-margin-remove-bottom">
                <div class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s" data-uk-grid>
                    <div>
                        <div class="uk-flex uk-flex-left in-award">
                            <div class="uk-margin-small-right">
                                <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-5-award-1.svg" alt="award-1" width="91" height="82" data-uk-img>
                            </div>
                            <div>
                                <h6>Total Investors</h6>
                                <p class="provider">since consception</p>
                                <p class="year"><?php echo $investorRecord; ?>+</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-flex uk-flex-left in-award">
                            <div class="uk-margin-small-right">
                                <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-7-icon-1.svg" alt="award-2" width="91" height="82" data-uk-img>
                            </div>
                            <div>
                                <h6>Total Deposits</h6>
                                <p class="provider">since consception</p>
                                <p class="year"><?php echo "$".number_format(floatval($depositRecord), 2); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-visible@m">
                        <div class="uk-flex uk-flex-left in-award">
                            <div class="uk-margin-small-right">
                                <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-7-icon-1.svg" alt="award-3" width="91" height="82" data-uk-img>
                            </div>
                            <div>
                                <h6>Total Withdrawal</h6>
                                <p class="provider">since consception</p>
                                <p class="year"><?php echo "$".number_format(floatval($withdrawRecord), 2); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-section-primary uk-preserve-color in-equity-6 uk-background-contain uk-background-center" data-src="assets/img/in-equity-14-bg.svg" data-uk-img>
            <div class="uk-container uk-margin-small-bottom">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-2xlarge@m uk-text-center">
                        <h1 style="color:#F4F0FD;">Ready to get started?</h1>
                        <p style="color:#F4F0FD;" class="uk-text-lead">Global access to exciting investment plan from a single account</p>
                    </div>
                    <div class="uk-width-3-4@m uk-margin-medium-top">
                        <div class="uk-flex uk-flex-center uk-flex-middle button-app">
                            <div>
                                <a href="./signin.html" class="uk-button uk-button-secondary uk-border-rounded">Start Investing now<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
    </main>
    <?php require_once("./include/footer.inc.php"); ?>
    <!-- javascript -->
    <script src="assets/js/vendors/uikit.min.js"></script>
    <script src="assets/js/vendors/utilities.min.js"></script>
    <!-- <script src="assets/js/vendors/trading-widget.min.js"></script> -->
    <!-- <script src="assets/js/vendors/market-plugin.min.js"></script> -->
    <script src="assets/js/vendors/particles.min.js"></script>
    <script src="assets/js/config-particles.js"></script>
    <script src="assets/js/config-theme.js"></script>
    <script src="https://widgets.coingecko.com/coingecko-coin-list-widget.js"></script>


    <script>

        // loading statistics data
        const withdrawStatistic = document.querySelector("#withdrawStatistic");
        const depositStatistic = document.querySelector("#depositStatistic");

        

        if(withdrawStatistic){
            fetch("http://127.0.0.1/projects/ultra/include/withdraw.php", {method: "GET"})
                .then(res => res.json())
                .then(data => {
                    // console.log(data);
                    makeChanges(withdrawStatistic, data["message"]);
                }).catch(error => {
                    console.log("An error was encountered!")
                    // console.log(error)
                });

        }

        if(depositStatistic){
            fetch("http://127.0.0.1/projects/ultra/include/deposit.php", {method: "GET"})
                .then(res => res.json())
                .then(data => {
                    // console.log(data);
                    makeChanges(depositStatistic, data["message"]);
                }).catch(error => {
                    console.log("An error was encountered!")
                    // console.log(error)
                });

        }

        function makeChanges(element, arraydata){
            let countInterim = Math.floor(arraydata.length % 5);
            let countIndex = 0;
            setInterval(() => {
                element.innerHTML = "";
                for(let count = 0; count < 5; count++){
                    const tr = document.createElement("tr");
                    const [style, text ] = reformWalletType(arraydata[(countIndex + count)].statistic_wallet_type);
                    tr.innerHTML = `<td><span class="in-icon icon-${style}">${text}</span></td><td>$${arraydata[(countIndex + count)].statistic_amount}</td><td>${arraydata[(countIndex + count)].statistic_investor_name}</td>`;
                    element.append(tr); 
                }
                if(countIndex <= countInterim){
                    countIndex++;
                }else{
                    countIndex = 0;
                }
            }, 4000);
        }

        function reformWalletType(wallet){
            switch(wallet){
                case "eth": return ["eth","ETH"];
                case "bitcoin": return ["btc","BTC"];
                case "ultra": return ["ultra","Ultra Token"];
                case "usdt": return ["usdt","USDT"];
                case "bnb": return ["bnb","BNB"];
            }
        }
        // end of loading statistics data
    </script>

<!-- <tr>
    <td><span class="in-icon icon-btc">BTC</span></td>
    <td>$3,500</td>
    <td>Bolbina Jesse</td>
</tr> -->
</body>
</html>
