<?php

    namespace app\services\impl;
    
    interface ReferralServiceImpl{
        function newReferral(array $new): string;
        function getReferralByUserSlug(string $slug): string;
        function getReferralByUserID(int $referral_id): string;
        function getAllPendingReferral(): string;
        function getAllPaidReferral(): string;
        function getAllSettledReferral(): string;
        function updatePendingReferral(int $referral_id): string;
        function updatePaidReferral(int $referral_id, int $referredBy): string;
    }

?>