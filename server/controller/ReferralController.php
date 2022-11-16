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
        
        function getAllPaidReferrals(){
            return $this->referralService->getAllPaidReferral();
        }

        function getAllPendingReferrals(){
            return $this->referralService->getAllPendingReferral();
        }

        function getAllClosedReferrals(){
            return $this->referralService->getAllSettledReferral();
        }

        function payReferral(int $referral_id, int $referredBy){
            return $this->referralService->updatePaidReferral($referral_id, $referredBy);
        }

    }

?>