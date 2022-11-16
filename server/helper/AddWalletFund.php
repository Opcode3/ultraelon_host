<?php
    namespace app\helper;

    class AddWalletFund{

        static function getInvestTotal($request){
            $amount = 0;
            foreach($request as $wallet){
                $amount += floatval($wallet["wallet_invest"]);
            }
            return $amount;
        }

        static function getUltraTotal($request){
            $amount = 0;
            foreach($request as $wallet){
                $amount += floatval($wallet["wallet_ultra"]);
            }
            return $amount;
        }

        static function getReferralTotal($request){
            $amount = 0;
            foreach($request as $wallet){
                $amount += floatval($wallet["wallet_referral"]);
            }
            return $amount;
        }

        static function getInvestmentROI(int $amount, $plan){
            $amt = 0;
            if( $plan == "classic" ){
                $amt += ((0.08 * $amount) + $amount);
            }else if ($plan == "premium"){
                $amt += ((0.2 * $amount) + $amount);
            }
            return $amt;
        }

        static function getUltraProfit($amount, $plan){
            $amt = 0;
            if( $plan == "classic" ){
                $amt += (0.02 * $amount);
            }else if ($plan == "premium"){
                $amt += (0.1 * $amount);
            }
            return $amt;
        }
    }

?>