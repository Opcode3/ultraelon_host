<!DOCTYPE html>
<html lang="en">
    <?php

use app\controller\SiteController;

        $title = "Affiliate Program";
        require_once("./include/header.inc.php"); 
        require_once("./vendor/autoload.php");

        $siteController = new SiteController();
        $faq = json_decode($siteController->getFaqsByWithdraws(),true);

        $faqResponse = $faq["message"];
        $counter = count($faqResponse);
        $halve = $counter / 2;
    ?>
    <!-- breadcrumb content begin -->
    <div class="uk-section uk-padding-remove-vertical in-equity-breadcrumb">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <ul class="uk-breadcrumb"></ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb content end -->
    <main>
        <!-- section content begin -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-flex uk-flex-center">
                        <div class="uk-width-3-5@m uk-text-center">
                            <h1 class="uk-margin-remove">Our <span class="in-highlight">Affiliate</span> Program</h1>
                            <p>There's no better way to spread the word about our investment plan than straight from you. Refer your friends and earn up to 8% from each completed order you refer.</p>
                            <a href=""></a>
                            <a href="./user/" class="uk-button uk-button-primary uk-border-rounded">Start Now<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="uk-section uk-section-secondary in-equity-8">
            <div class="uk-container uk-margin-medium-top uk-margin-medium-bottom">
                <div class="uk-grid-match uk-grid-medium uk-child-width-1-2@s uk-child-width-1-3@m in-card-10 uk-grid" data-uk-grid="">
                    
                    <div class="uk-grid-margin uk-first-column">
                        <div class="uk-padding-small">
                            <h4 class="uk-margin-top">
                                <span>Investing</span>
                            </h4>
                            <hr>
                            <p>A wide selection of investment product to help build diversified portfolio</p>
                        </div>
                    </div>
                    <div class="uk-grid-margin">
                        <div class="uk-padding-small">
                            <h4 class="uk-margin-top">
                                <span>Trading</span>
                            </h4>
                            <hr>
                            <p>Powerful trading tools, resources, insight and support</p>
                        </div>
                    </div>
                    <div class="uk-grid-margin">
                        <div class="uk-padding-small">
                            <h4 class="uk-margin-top">
                                <span>Wealth management</span>
                            </h4>
                            <hr>
                            <p>Dedicated financial consultant to help reach your own specific goals</p>
                        </div>
                    </div>
                    <div class="uk-grid-margin uk-first-column">
                        <div class="uk-padding-small">
                            <h4 class="uk-margin-top">
                                <span href="#">Investment advisory</span>
                            </h4>
                            <hr>
                            <p>A wide selection of investing strategies from seasoned portfolio managers</p>
                        </div>
                    </div>
                    <div class="uk-grid-margin">
                        <div class="uk-padding-small">
                            <h4 class="uk-margin-top">
                                <span>Smart portfolio</span>
                            </h4>
                            <hr>
                            <p>A revolutionary, fully-automated investmend advisory services</p>
                        </div>
                    </div>
                    <div class="uk-grid-margin">
                        <div class="uk-padding-small">
                            <h4 class="uk-margin-top">
                                <span href="#">Mutual fund advisor></span>
                            </h4>
                            <hr>
                            <p>Specialized guidance from independent local advisor for hight-net-worth investors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="uk-section in-equity-9">
            <div class="uk-container uk-margin-medium-top uk-margin-bottom">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-4@m uk-margin-top">
                        <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center in-register" data-uk-grid="">
                            <div class="uk-width-1-1 in-h-line uk-first-column">
                                <h2>Getting started is easy</h2>
                            </div>
                            <div class="uk-grid-margin uk-first-column">
                                <span class="in-icon-wrap circle">1</span>
                                <p>Tell your friends about our investment services and include your referral link.</p>
                            </div>
                            <div class="uk-grid-margin">
                                <span class="in-icon-wrap circle">2</span>
                                <p>Your referral sign up and successfully register/pay for an investment plan.</p>
                            </div>
                            <div class="uk-grid-margin">
                                <span class="in-icon-wrap circle">3</span>
                                <p>You earn up to 8% of every investor(s) you refer to our system.</p>
                            </div>
                            <div class="uk-width-1-1 uk-grid-margin uk-first-column">
                                <a href="./user/" class="uk-button uk-button-text">Goto account<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-margin-medium-bottom">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-2-3@m uk-text-center">
                        <h3>Frequently Asked <span class="in-highlight">Questions</span></h3>
                        <p class="uk-margin-small-top uk-text-large uk-text-center">Do you have any question</p>
                    </div>
                    <div class="uk-width-1-1@m">
                        <?php
                            if($counter > 0){
                        ?>
                        <div class="uk-grid uk-child-width-1-2@m uk-margin-medium-top" data-uk-grid>
                            <div>
                                <ul class="in-faq-2" data-uk-accordion>
                                    <?php

                                        for($m = 0; $m < $halve; $m++){
                                            $faq = $faqResponse[$m];
                                            ?>
                                            <li>
                                                <a class="uk-accordion-title" href="#">
                                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                        <?php echo $faq["faq_title"]; ?>
                                                    </div>
                                                </a>
                                                <div class="uk-accordion-content uk-card uk-card-default uk-card-body uk-border-rounded">
                                                    <p>
                                                        <?php echo $faq["faq_content"]; ?>
                                                    </p>
                                                </div>
                                            </li>

                                            <?php
                                        }

                                    ?>
                                </ul>
                            </div>
                            <div>
                                <ul class="in-faq-2" data-uk-accordion>
                                <?php

                                    for($m = $halve; $m < $counter; $m++){
                                        $faq = $faqResponse[$m];
                                        ?>
                                        <li>
                                            <a class="uk-accordion-title" href="#">
                                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                    <?php echo $faq["faq_title"]; ?>
                                                </div>
                                            </a>
                                            <div class="uk-accordion-content uk-card uk-card-default uk-card-body uk-border-rounded">
                                                <p>
                                                    <?php echo $faq["faq_content"]; ?>
                                                </p>
                                            </div>
                                        </li>

                                        <?php
                                        }
                                        ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                            }else{
                                ?>
                                <div class="uk-grid uk-child-width-1-2@m uk-margin-medium-top" data-uk-grid>
                                    <div>
                                        <ul class="in-faq-2" data-uk-accordion>
                                            <li>
                                                <a class="uk-accordion-title" href="#">
                                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                        How does the affiliate program works?
                                                    </div>
                                                </a>
                                                <div class="uk-accordion-content uk-card uk-card-default uk-card-body uk-border-rounded">
                                                    <p>
                                                        The partnership program aims to attract as many clients as possible. Being a partner, you
                                                        get 8%,3%,1% bonus from each deposit made by your referral. The more referrals you
                                                        attract, the more they deposit, the more bonuses you will receive.
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul class="in-faq-2" data-uk-accordion>
                                            <li>
                                                <a class="uk-accordion-title" href="#">
                                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                        What is necessary to have an opportunity to earn the partner reward?
                                                    </div>
                                                </a>
                                                <div class="uk-accordion-content uk-card uk-card-default uk-card-body uk-border-rounded">
                                                    <p>
                                                        To have an opportunity to earn the partner reward, you just need to create a personal
                                                        account in our program; to have the own investments in the program is not necessarily.
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">
                                                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                                        Why can't I withdraw?
                                                    </div>
                                                </a>
                                                <div class="uk-accordion-content uk-card uk-card-default uk-card-body uk-border-rounded">
                                                    <p>
                                                        Well this is because here at UltraElon we've set a specific withdrawal limit due to your
                                                        investment package
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
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
    <script src="assets/js/config-theme.js"></script>
</body>

</html>