<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="ULTRAELON is an African based international financial company engaged in investment
activities, which are related to trading on financial markets and cryptocurrency exchanges
performed by qualified professional traders.">
    <meta name="keywords" content="Investment, Cryptocurrency, traders, financial company, ultraelon, ultra investment platform, ultra token, bitcoin, ethereum, bnb, usdt">
    <meta name="author" content="Ultraelon Investment Platform">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#A37FEF" />
    <!-- Site Properties -->
    <title>Sign up - Ultraelon Investment Platform</title>
    <!-- critical preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="preload" href="assets/js/vendors/uikit.min.js" as="script">
    <link rel="preload" href="assets/css/vendors/uikit.min.css" as="style">
    <link rel="preload" href="assets/css/style.css" as="style">
    <!-- icon preload -->
    <link rel="preload" href="assets/fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <meta property="og:image" content="assets/img/favicon.png">

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
                                    <p class="uk-text-large uk-margin-small-top uk-margin-medium-bottom">Register account</p>

                                    <!-- login form begin -->
                                    <form id="frmRegister" class="uk-grid uk-form">
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
                                            <input class="uk-input uk-border-rounded" id="username" type="text" placeholder="Username">
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-mail-bulk fa-sm"></span>
                                            <input class="uk-input uk-border-rounded"  id="email" type="email" placeholder="Email address">
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
                                            <input class="uk-input uk-border-rounded"  id="password" type="password" placeholder="Password"> 
                                            <!-- value="12334444"  value="Dora123" value="opcode2@gmail.com" -->
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