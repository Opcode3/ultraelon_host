<?php

    namespace app\services\impl;
    
    interface ReferralServiceImpl{
        function newReferral(array $new): string;
        function getReferralByUserSlug(string $slug): string;
        function getReferralByUserID(int $referral_id): string;
    }

?>