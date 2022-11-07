<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="Ultraelon Investment Platform">
    <meta name="keywords" content="blockit, uikit3, indonez, handlebars, scss, javascript">
    <meta name="author" content="Indonez">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FCB42D" />
    <!-- Site Properties -->
    <title>Sign up - Ultraelon Investment Platform</title>
    <!-- critical preload -->
    <link rel="preload" href="assets/js/vendors/uikit.min.js" as="script">
    <link rel="preload" href="assets/css/vendors/uikit.min.css" as="style">
    <link rel="preload" href="assets/css/style.css" as="style">
    <!-- icon preload -->
    <link rel="preload" href="assets/fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <!-- font preload -->
   <!-- Favicon and apple icon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
    <!-- css -->
    <link rel="stylesheet" href="assets/css/vendors/uikit.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- preloader begin -->
    <div class="in-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- preloader end -->
    <main>
        <!-- section content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <div class="uk-container uk-container-expand">
                <div class="uk-grid" data-uk-height-viewport="expand: true">
                    <div class="uk-width-3-5@m uk-background-cover uk-background-center-right uk-visible@m uk-box-shadow-xlarge" style="background: url(assets/img/logo.jpeg) center center;">
                    </div>
                    <div class="uk-width-expand@m uk-flex uk-flex-middle">
                        <div class="uk-grid uk-flex-center">
                            <div class="uk-width-5-6@s uk-width-4-5@m uk-width-3-5@l">
                                <div class="uk-text-center in-padding-horizontal@s">
                                    <!-- logo begin -->
                                    <a class="uk-logo" href="./">
                                        <img src="assets/img/in-lazy.gif" data-src="assets/img/ultraelon.png" alt="logo" width="146" height="39" data-uk-img>
                                    </a>
                                    <!-- logo end -->
                                    <p class="uk-text-lead uk-margin-small-top uk-margin-medium-bottom">Register account</p>
                                    <!-- login form begin -->
                                    <form id="frmRegister" class="uk-grid uk-form">
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
                                            <input class="uk-input uk-border-rounded" value="Dora123" id="username" type="text" placeholder="Username">
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-mail-bulk fa-sm"></span>
                                            <input class="uk-input uk-border-rounded" value="opcode2@gmail.com" id="email" type="email" placeholder="Email address">
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
                                            <input class="uk-input uk-border-rounded" value="12334444" id="password" type="password" placeholder="Password">
                                        </div>
                                        <input type="hidden" value="<?php echo (isset($_GET["a"]) && strlen(trim($_GET["a"])) > 4) ? $_GET["a"] : "nil";  ?>" id="referredBy">
                                        <div class="uk-margin-small uk-width-1-1 uk-text-small">
                                            <label><input class="uk-checkbox uk-border-rounded" required type="checkbox"> I agree with the <a href="">Terms and Conditions</a></label>
                                        </div>
                                        <div id="notify" class="uk-width-1-1"></div>
                                        <div class="uk-margin-small uk-width-1-1">
                                            <button class="uk-button uk-width-1-1 uk-button-primary uk-border-rounded uk-float-left" type="submit" id="submit">
                                                <div id="in-spinner" uk-spinner></div>
                                                <span id="in-mtext">Register account</span>
                                            </button>
                                        </div>
                                    </form>
                                    <!-- login form end -->
                                    
                                    <span class="uk-text-small">Already have an account? <a class="uk-button uk-button-text" href="./signin.html">Log in</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
    </main>
    <!-- javascript -->
    <script src="assets/js/vendors/uikit.min.js"></script>
    <script src="assets/js/vendors/utilities.min.js"></script>
    <script src="assets/js/config-theme.js"></script>
    <script src="assets/js/main.js"></script>
    
</body>

</html>