<!DOCTYPE html>
<html lang="en">
    <?php

use app\controller\SiteController;

        $title = "Our Investors";
        require_once("./include/header.inc.php");
        require_once("./vendor/autoload.php");

        $siteController = new SiteController();
        $testimonyResponse = json_decode($siteController->getTestimonies(), true);

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
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-4@m">
                        <div class="uk-width-1-1 uk-flex uk-flex-center">
                            <div class="uk-width-4-5@m uk-text-center">
                                <h1 class="uk-margin-remove">We <span class="in-highlight">help</span> our customers.</h1>
                                    <p class="uk-text-lead uk-text-muted uk-margin-small-top">To engage investors so their companies can grow</p>
                                    <p>Our customers look to us as guides, and we weave our deep legal and technical experience into our software and services.</p>
                                <!-- <p class="uk-text-lead uk-text-muted uk-margin-small-top">For more than 30 years, we’ve been empowering clients by helping them take control of their financial lives.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <!-- <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid uk-child-width-1-2@m in-testimonial-8" data-uk-grid>
                    <div>
                        <div class="uk-card uk-card-default uk-box-shadow-small uk-border-rounded">
                            <img class="uk-position-bottom-right" src="img/blockit/in-testimoni-2.png" alt="client-testimoni" width="200">
                            <div class="uk-card-header">
                                <blockquote>
                                    <p>The extension makes collecting feedback so much easier! Shipright then really helps us make decisions based on the data we collected.</p>
                                </blockquote>
                            </div>
                            <div class="uk-card-footer">
                                <img src="img/blockit/in-client-testi-1.svg" alt="client-logo" width="54">
                                <blockquote>
                                    <footer>Gabrielle Barger<br><cite>Help Desk at pushbullet</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-box-shadow-small uk-border-rounded">
                            <img class="uk-position-bottom-right" src="img/blockit/in-testimoni-3.png" alt="client-testimoni" width="200">
                            <div class="uk-card-header">
                                <blockquote>
                                    <p>Quick, easy, and super helpful to collect and organise feedback from all kinds of channels we use to communicate with our customers.</p>
                                </blockquote>
                            </div>
                            <div class="uk-card-footer">
                                <img src="img/blockit/in-client-testi-2.svg" alt="client-logo" width="54">
                                <blockquote>
                                    <footer>Melvin Cortez<br><cite>Cloud Architect at stormpath</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section in-offset-top-60 in-offset-top-50@s">
            <div class="uk-container">
                <?php
                    if(is_array($testimonyResponse["message"]) && count($testimonyResponse["message"]) > 0){
                        
                ?>
                <div class="uk-grid uk-child-width-1-3@m in-testimonial-7" data-uk-grid>
                    <?php
                        foreach($testimonyResponse["message"] as $key => $testimony){
                    ?>
                    <div>
                        <div class="uk-card uk-card-default uk-box-shadow-small uk-border-rounded">
                            <!-- <div class="uk-card-header">
                                <img src="img/blockit/in-client-testi-3.svg" alt="client-logo" width="60">
                            </div> -->
                            <div class="uk-card-body">
                                <blockquote>
                                    <p style="min-height: 160px;"><?php echo $testimony["testimony_message"] ?></p>
                                    <!-- <p>Really love the product! It saves so much time and helps a lot in organize our feedback. Very huge potential.</p> -->
                                </blockquote>
                            </div>
                            <div class="uk-card-footer">
                                <blockquote>
                                    <footer><?php echo $testimony["testimony_name"] ?><br><cite><?php echo $testimony["testimony_country"] ?></cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <?php
                    }
                ?>
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