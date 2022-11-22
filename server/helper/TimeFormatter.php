<?php

    namespace app\helper;

    class TimeFormatter{

        public static function getDaysDiff($createdAt){
            // echo $createdAt;
            $now = date_create(date("d-M-Y H:i:s"));
            $timeDiff = date_diff(date_create($createdAt), $now);
            // $currentData = date("");
            return $timeDiff->format('%R%a days');
            // return 400;
        }

        public static function getDaysLeft($createdAt){
            $now = date_create(date("d-M-Y H:i:s"));
            $timeDiff = date_diff(date_create($createdAt), $now);
            // $currentData = date("");
            return $timeDiff->format('%a');
        }
    }
?>