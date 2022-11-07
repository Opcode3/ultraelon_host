<?php
    $title = isset($GLOBALS["title"]) ? $GLOBALS["title"] : "Home";

    $active = 0;

    if($title == "Investment"){
        $active = 2;
    }else if($title == "About Us"){
        $active = 1;
    }else if($title == "Affiliate Program"){
        $active = 3;
    }else if($title == "FAQs"){
        $active = 4;
    }else if($title == "Contact"){
        $active = 5;
    }
?> 
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="Premium HTML5 Template by Indonez">
    <meta name="keywords" content="blockit, uikit3, indonez, handlebars, scss, javascript">
    <meta name="author" content="Indonez">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#A37FEF" />
    <!-- Site Properties -->
    <title><?php echo $title; ?> - Ultraelon Investment Platform</title>
    <!-- critical preload -->
    <link rel="preload" href="assets/js/vendors/uikit.min.js" as="script">
    <link rel="preload" href="assets/css/vendors/uikit.min.css" as="style">
    <link rel="preload" href="assets/css/style.css" as="style">
    <!-- icon preload -->
    <link rel="preload" href="assets/fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <!-- font preload -->
    <!-- <link rel="preload" href="assets/fonts/archivo-v9-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/archivo-v9-latin-300.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/archivo-v9-latin-700.woff2" as="font" type="font/woff2" crossorigin> -->
    <!-- Favicon and apple icon -->
    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
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
    <header>
        <!-- header content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <nav class="uk-navbar-container <?php echo $title=="Home" ? "uk-navbar-transparent" : "" ?>" data-uk-sticky="show-on-up: true; animation: uk-animation-slide-top;">
                <div class="uk-container" data-uk-navbar>
                    <div class="uk-navbar-left">
                        <div class="uk-navbar-item">
                            <!-- logo begin -->
                            <a class="uk-logo" href="./">
                                <img src="assets/img/in-lazy.gif" data-src="assets/img/ultraelon.png" style="border-radius: 500px;" alt="logo" width="146" height="39" data-uk-img>
                                <!-- <img src="assets/img/in-lazy.gif" data-src="assets/img/in-logo.svg" alt="logo" width="146" height="39" data-uk-img> -->
                            </a>
                            <!-- logo end -->
                            <!-- navigation begin -->
                            <ul class="uk-navbar-nav uk-visible@m">
                                <li class="<?php echo $active == 0 ? "uk-active" : ""; ?>"><a href="./">Home</a></li>
                                <li class="<?php echo $active == 1 ? "uk-active" : ""; ?>"><a href="./about.php">About us</a></li>
                                <li class="<?php echo $active == 2 ? "uk-active" : ""; ?>"><a href="./investments.php">Investments</a></li>
                                <li class="<?php echo $active == 3 ? "uk-active" : ""; ?>"><a href="./referral.php">Affiliate</a></li>
                                <li><a href="./contact.php">Support<i class="fas fa-chevron-down"></i></a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="<?php echo $active == 4 ? "uk-active" : ""; ?>"><a href="./faqs.php">FAQs</a></li>
                                            <li class="<?php echo $active == 5 ? "uk-active" : ""; ?>"><a href="./contact.php">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <!-- navigation end -->
                        </div>
                    </div>
                    <div class="uk-navbar-right">
                        <div class="uk-navbar-item uk-visible@m in-optional-nav">
                            <a href="./signin.html" class="uk-button uk-button-text">Log in<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                            <a href="./register.php" class="uk-button uk-button-primary uk-border-rounded">Sign up<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- header content end -->
    </header>
    