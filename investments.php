<!DOCTYPE html>
<html lang="en">
    <?php 
        $title = "Investment";
        require_once("./include/header.inc.php"); 
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
        <div class="uk-section in-equity-17">
            <div class="uk-container uk-margin-top uk-margin-medium-bottom">
                <div class="uk-grid uk-grid-collapsed uk-flex uk-flex-center">
                    <div class="uk-width-3-5@m uk-text-center">
                        <h1 class="uk-margin-remove">Choose your <span class="in-highlight">account</span> type</h1>
                        <p class="uk-text-lead uk-text-muted uk-margin-small-top">Simply select your preferred account type in our application form.</p>
                    </div>
                    <div class="uk-width-1-1 uk-margin-medium-top">
                        <div class="uk-grid-small uk-child-width-1-2@s  uk-child-width-1-3@l in-equity-pricing" data-uk-grid>
                            
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimum funding<span class="uk-label uk-margin-small-left in-label-small">USD 5</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Classic Plan</h2>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Lots of our investors begins with this plan</p>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <li> <b>Minimum:</b> 5</li>
                                        <li> <b>Maximum:</b> 500</li>
                                        <li><b>ROI Profit:</b>  8%</li>
                                        <li><b>Ultra Profit:</b>  2%</li>
                                        <li><b>Duration:</b> 24 Hours</li>
                                    </ul>
                                    <a href="./user/" class="uk-button uk-button-primary uk-border-rounded uk-align-center">Start Investing Now<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimum funding<span class="uk-label uk-margin-small-left in-label-small">USD 500</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Premium Plan</h2>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Most sorted plan for almost every medium investors</p>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <li> <b>Minimum:</b> 500</li>
                                        <li> <b>Maximum:</b> 3000</li>
                                        <li><b>ROI Profit:</b>  20%</li>
                                        <li><b>Ultra Profit:</b>  10%</li>
                                        <li><b>Duration:</b> 24 Hours</li>
                                    </ul>
                                    <a href="./user/" class="uk-button uk-button-primary uk-border-rounded uk-align-center">Start Investing Now<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                                    <!-- <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimum funding<span class="uk-label uk-margin-small-left in-label-small">USD 200</span></p> -->
                                    <h3 class="uk-margin-top uk-margin-remove-bottom">Pro (Whales Investors)</h3>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Become our partner and enjoy the enormous longtime benefit.</p>
                                    <hr>

                                    <p>
                                        The Ultra token is sponsoring sports teams, building hospitals, schools, financing big casinos
                                        and building a bigger game community. You too can be a shareholder.
                                    </p>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <!-- <li>Tax-free spread betting profits</li> -->
                                        <li>Earn as a shareholder</li>
                                        <!-- <li>Low minimum deposit</li> -->
                                    </ul>
                                    <a href="./user/" class="uk-button uk-button-default uk-border-rounded uk-align-center">Start Investing Now<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="uk-section in-equity-17">
            <div class="uk-container uk-margin-top uk-margin-medium-bottom">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-5@m uk-text-center">
                        <h1 class="uk-margin-remove">Choose your <span class="in-highlight">Investment</span> plan</h1>
                        <p class="uk-text-lead uk-text-muted uk-margin-small-top">Simply select your preferred investment plan and grow your account.</p>
                    </div>
                    <div class="uk-width-3-4@m uk-margin-medium-top">
                        <div class="uk-grid-collapse uk-child-width-1-2@m in-equity-pricing uk-grid" data-uk-grid="">
                            <div class="uk-first-column">
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimum funding<span class="uk-label uk-margin-small-left in-label-small">USD 5</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Classic Plan</h2>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <li>Instant Withdrawal</li>
                                        <li>Minimum Capital: <span class="in-highText">$5</span> </li>
                                        <li>Maximum Capital: <span class="in-highText">$500</span> </li>
                                        <li>Duration: <span class="in-highText">24Hours.</span></li>
                                        <li>Profit: <span class="in-highText">8% ROI</span></li>
                                        <li>Plus: <span class="in-highText">2% Ultra token</span></li>
                                        <li>Referral Bonus: <span class="in-highText">3% of deposit </span></li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Invest on Classic Plan<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase">Minimium funding<span class="uk-label uk-margin-small-left in-label-small">USD 500</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Premium Plan</h2>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet in-list-check">
                                        <li>Instant Withdrawal</li>
                                        <li>Minimum Capital: <span class="in-highText">$500</span> </li>
                                        <li>Maximum Capital: <span class="in-highText">$3000</span> </li>
                                        <li>Duration: <span class="in-highText">24Hours.</span></li>
                                        <li>Profit: <span class="in-highText">20% ROI</span></li>
                                        <li>Plus: <span class="in-highText">10% Ultra token</span></li>
                                        <li>Referral Bonus: <span class="in-highText">8% of deposit </span></li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-align-center">Invest on Premium Plan<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-margin-large-bottom in-equity-11 uk-background-contain uk-background-top-right" data-src="assets/img/in-equity-11-bg.png" data-uk-img>
            <div class="uk-container uk-margin-top uk-margin-bottom">
                <div class="uk-width-3-4@m">
                    <div class="uk-grid-medium uk-grid-match uk-child-width-1-3@m uk-child-width-1-2@s" data-uk-grid>
                        <div class="uk-width-1-1">
                            <h1 class="uk-margin-small-bottom">Our most <span class="in-highlight">competitive benefits</span></h1>
                            <p class="uk-text-lead uk-margin-remove-top">Find your next trade with access to a wide range of markets.</p>
                        </div>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                <div class="uk-flex uk-flex-column uk-flex-middle">
                                    <h4 class="uk-margin-medium-bottom">Investment Growth</h4>
                                    <div class="uk-margin-bottom ">
                                        <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-11-icon-1.svg" alt="icon-1" width="128" data-height data-uk-img>
                                    </div>
                                    <div>
                                        <p class="uk-text-small uk-text-center uk-margin-remove">Ultraelon is a competent investment institution that offers consecutive growth on your existing finances on a continuous cyclic basis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                <div class="uk-flex uk-flex-column uk-flex-middle">
                                    <h5 class="uk-margin-small-bottom">Fast Payment</h5>
                                    <div class="uk-margin-bottom">
                                        <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-11-icon-2.svg" alt="icon-2" width="128" data-height data-uk-img>
                                    </div>
                                    <div>
                                        <p class="uk-text-small uk-margin-remove">Our all retreats are treated spontaneously once requested. There are no maximum limits. The minimum withdrawal amount is only $1.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                <div class="uk-flex uk-flex-column uk-flex-middle">
                                    <h5 class="uk-margin-small-bottom">24/7 Support</h5>
                                    <div class="uk-margin-bottom">
                                        <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-11-icon-3.svg" alt="icon-3" width="128" data-height data-uk-img>
                                    </div>
                                    <div>
                                        <p class="uk-text-small uk-margin-remove">We provide 24/7 customer support through e-mail and telegram. Our support representatives are periodically available to elucidate any difficulty.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                <div class="uk-flex uk-flex-middle">
                                    <div class="uk-margin-right">
                                        <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-11-icon-4.svg" alt="icon-4" width="128" data-height data-uk-img>
                                    </div>
                                    <div>
                                        <h5 class="uk-margin-small-bottom">Several Profits</h5>
                                        <p class="uk-text-small uk-margin-remove">You have daily profit as long as you have trading account with us.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                <div class="uk-flex uk-flex-middle">
                                    <div class="uk-margin-right">
                                        <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-11-icon-5.svg" alt="icon-5" width="128" data-height data-uk-img>
                                    </div>
                                    <div>
                                        <h5 class="uk-margin-small-bottom">Early Profit</h5>
                                        <p class="uk-text-small uk-margin-remove">Daily profits arrive on the specified time and acured to our investors accounts.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-medium">
                                <div class="uk-flex uk-flex-middle">
                                    <div class="uk-margin-right">
                                        <img src="assets/img/in-lazy.gif" data-src="assets/img/in-equity-11-icon-6.svg" alt="icon-6" width="128" data-height data-uk-img>
                                    </div>
                                    <div>
                                        <h5 class="uk-margin-small-bottom">SSL Secured</h5>
                                        <p class="uk-text-small uk-margin-remove">SSL Security confirms that the presented content is genuine and legitimate.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        
        <!-- section content end -->
    </main>
    <?php require_once("./include/footer.inc.php"); ?>
    <!-- javascript -->
    <script src="assets/js/vendors/uikit.min.js"></script>
    <script src="assets/js/vendors/utilities.min.js"></script>
    <script src="assets/js/config-theme.js"></script>
</body>

</html>