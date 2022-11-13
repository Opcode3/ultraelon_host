<?php
    namespace app\helper;

    class GetLockedCapital{

        static function investment($request){
            $amount = 0;
            foreach ($request as $value) {
                $investStatus = (int) $value["invest_status"];
                $investPlan = strtolower($value["invest_plan"]);
                $investAmount = (int) $value["invest_amount"];

                if($investStatus == 1){
                    if( $investPlan == "classic" ){
                        $amount += ((0.08 * $investAmount) + $investAmount);

                    }else if ($investPlan == "premium"){
                        $amount += (0.2 * $investAmount);
                    }
                }
            }
            return number_format($amount, 2);
        }

        static function ultra($request){
            $amount = 0;
            foreach ($request as $key => $value) {
                $investStatus = (int) $value["invest_status"];
                $investPlan = strtolower($value["invest_plan"]);
                $investAmount = (int) $value["invest_amount"];

                if($investStatus == 1){
                    if( $investPlan == "classic" ){
                        $amount += (0.02 * $investAmount);
                    }else if ($investPlan == "premium"){
                        $amount += (0.1 * $investAmount);
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