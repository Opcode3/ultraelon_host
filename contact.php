<?php
require_once("./vendor/autoload.php");
use app\controller\UserController;

    if(isset($_POST["submit"]) && isset($_POST["email"]) && strlen(trim($_POST["email"])) > 9){
        $name = $_POST["name"];
        $subject = $_POST["subject"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $requestPayload = array(
            "contact_name" => $name, "contact_email" => $email, 
            "contact_subject" => $subject, "contact_message" => $message,
        );
        $userController = new UserController();
        $response = json_decode($userController->postSupportQueryForm($requestPayload), true);
        echo "<script> alert('".$response["message"]."'); </script>";
        unset($_POST);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <?php 
        $title = "Contact";
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
        <div class="uk-section">
            <div class="uk-container uk-margin-small-top uk-margin-bottom">
                <div class="uk-grid uk-flex uk-flex-center in-contact-6">
                    <!-- <div class="uk-width-1-1">
                        <iframe class="uk-width-1-1 uk-height-large uk-border-rounded" src="https://www.google.com/maps/embed?pb&#x3D;!1m14!1m8!1m3!1d12607.361112413788!2d144.955928!3d-37.81721!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sbd!4v1635163568811!5m2!1sen!2sbd">
                        </iframe>
                    </div> -->
                    <div class="uk-width-4-5@m">
                        <div class="uk-grid uk-child-width-1-3@m uk-margin-medium-top uk-text-center" data-uk-grid>
                            <div>
                                <h5 class="uk-margin-remove-bottom"><i class="fas fa-map-marker-alt fa-sm uk-margin-small-right"></i>Address</h5>
                                <p class="uk-margin-small-top">1 Frederick Place London, N8 8AF United Kingdom.</p>
                            </div>
                            <div>
                                <h5 class="uk-margin-remove-bottom"><i class="fas fa-envelope fa-sm uk-margin-small-right"></i>Email</h5>
                                <p class="uk-margin-small-top uk-margin-remove-bottom">halo@ultraelon.com</p>
                                <p class="uk-text-small uk-text-muted uk-text-uppercase">for public inquiries</p>
                            </div>
                            <div>
                                <h5 class="uk-margin-remove-bottom"><i class="fa fa-whatsapp-square fa-sm uk-margin-small-right"></i>Whatsapp</h5>
                                <p class="uk-margin-small-top uk-margin-remove-bottom">+1(301)372-9072</p>
                                <p class="uk-text-small uk-text-muted uk-text-uppercase">Mon - Fri, 9am - 5pm</p>
                            </div>
                        </div>
                        <hr class="uk-margin-medium">
                        <p class="uk-margin-remove-bottom uk-text-lead uk-text-muted uk-text-center">Have a questions?</p>
                        <h1 class="uk-margin-small-top uk-text-center">Let's <span class="in-highlight">get in touch</span></h1>
                        <form method="post" class="uk-form uk-grid-small uk-margin-medium-top" data-uk-grid>
                            <div class="uk-width-1-2@s uk-inline">
                                <span class="uk-form-icon fas fa-user fa-sm"></span>
                                <input class="uk-input uk-border-rounded" id="name" required name="name" minlength="5" type="text" placeholder="Full name">
                            </div>
                            <div class="uk-width-1-2@s uk-inline">
                                <span class="uk-form-icon fas fa-envelope fa-sm"></span>
                                <input class="uk-input uk-border-rounded" id="email" required name="email" type="email" placeholder="Email address">
                            </div>
                            <div class="uk-width-1-1 uk-inline">
                                <span class="uk-form-icon fas fa-pen fa-sm"></span>
                                <input class="uk-input uk-border-rounded" id="subject" required name="subject" minlength="4" type="text" placeholder="Subject">
                            </div>
                            <div class="uk-width-1-1">
                                <textarea class="uk-textarea uk-border-rounded" id="message" required name="message" minlength="5" rows="6" placeholder="Message"></textarea>
                            </div>
                            <div class="uk-width-1-1">
                                <button class="uk-width-1-1 uk-button uk-button-primary uk-border-rounded" type="submit" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
    </main>
    <?php 
        require_once("./include/footer.inc.php"); 
    ?>
    <!-- javascript -->
    <script src="assets/js/vendors/uikit.min.js"></script>
    <script src="assets/js/vendors/utilities.min.js"></script>
    <script src="assets/js/config-theme.js"></script>
</body>

</html>