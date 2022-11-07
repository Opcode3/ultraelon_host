<?php

namespace app\controller;

use app\services\impl\ReferralServiceImpl;
use app\services\ReferralService;

    class ReferralController{

        private $referralService;

        function __construct()
        {
            $this->referralService = new ReferralService();
        }

        function getReferralsById(int $referred_id){
            return $this->referralService->getReferralByUserID($referred_id);
        } 

    }

?>