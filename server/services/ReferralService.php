<?php

    namespace app\services;

use app\config\MysqlDBH;
use app\model\Referral;
use app\response\Response;
use app\services\impl\ReferralServiceImpl;

    class ReferralService implements ReferralServiceImpl{

        private $model;

        function __construct() 
        {
            $mysqlConnector = new MysqlDBH();
            $this->model = new Referral($mysqlConnector);
        }

        function newReferral(array $new): string
        {
            $response = $this->model->newReferral($new);
            if($response){
                return Response::json("Referral registration was successful!", 201);
            }
            return Response::json("An error was encountered while trying to register referrer!", 500);   
        }

        function getReferralByUserSlug(string $slug): string // not too valid: discard later
        {
            $response = $this->model->findReferralsBySlug($slug);
            return Response::json($response);
        }

        function getReferralByUserID(int $referral_id): string
        {
            $response = $this->model->findReferralsByUserId($referral_id);
            if(is_array($response)){
                return Response::json($response, 200);
            }
            return Response::json([]);
        }
    }

?>