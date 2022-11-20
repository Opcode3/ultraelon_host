<?php

use app\controller\SiteController;

        // $json = file_get_contents("../statistic.json",true);
        // echo $json;
        require_once("../vendor/autoload.php");
        $siteController = new SiteController();
        $depositResponse = $siteController->getDepositStatistics();
        echo $depositResponse;

?>