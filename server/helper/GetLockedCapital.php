<?php
    namespace app\helper;

    class GetLockedCapital{

        static function investment($request){
            $amount = 0;
            foreach ($request as $value) {
                $investStatus = (int) $value["invest_status"];
                $investPlan = strtolower($value["invest_plan"]);
                $investAmount = (int) $value["invest_amount"];
                $days = TimeFormatter::getDaysLeft($value["createdAt"]);

                if($investStatus == 1){
                    if( $investPlan == "classic" ){
                        $amount += (((0.08 * $investAmount) * $days) + $investAmount);
                    }else if ($investPlan == "premium"){
                        $amount += (((0.2 * $investAmount) * $days) + $investAmount);
                    }
                }
            }
            return number_format($amount, 2);
        }


        static function getPaymentFromInvestment(int $amount, $plan, $createdAt): string{
            $amt = 0; $ultra = 0;
            $days = TimeFormatter::getDaysLeft($createdAt);

            if( $plan == "classic" ){
                $amt += ((0.08 * $amount) * $days) + $amount;
                $ultra += (0.02 * $amount) * $days;

            }else if ($plan == "premium"){
                $amt += ((0.2 * $amount) * $days) + $amount;
                $ultra += (0.1 * $amount) * $days;
            }
            $profitInvest =  $amt;
            $profitUltra =  $ultra;
            return $profitInvest."&".$profitUltra;
        }

        static function ultra($request){
            $amount = 0;
            foreach ($request as $key => $value) {
                $investStatus = (int) $value["invest_status"];
                $investPlan = strtolower($value["invest_plan"]);
                $investAmount = (int) $value["invest_amount"];
                $days = TimeFormatter::getDaysLeft($value["createdAt"]);

                if($investStatus == 1){
                    if( $investPlan == "classic" ){
                        $amount += ((0.02 * $investAmount) * $days);
                    }else if ($investPlan == "premium"){
                        $amount += ((0.1 * $investAmount) * $days);
                    }
                }
            }
            return number_format($amount, 2);
        }

        static function referral($request): int{
            $amount = 0; // referral bonus is 3 dollars
            foreach ($request as $key => $value) {
                if($value["referral_status"] == 1){
                    $amount += 3;
                }
            }
            return number_format($amount, 2);
        }




    }


?>