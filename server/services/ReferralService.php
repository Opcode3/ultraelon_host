<?php

    namespace app\services;

use app\config\MysqlDBH;
use app\model\Referral;
use app\response\Response;
use app\services\impl\ReferralServiceImpl;

    class ReferralService implements ReferralServiceImpl{

        private $model;
        private $walletService;

        function __construct() 
        {
            $mysqlConnector = new MysqlDBH();
            $this->model = new Referral($mysqlConnector);
            $this->walletService = new WalletService();
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

        function getAllPendingReferral(): string
        {
            $response = $this->model->fetchAllReferrals(0);
            return Response::json($response);
        }

        function getAllPaidReferral(): string
        {
            $response = $this->model->fetchAllReferrals(1);
            return Response::json($response);
        }

        function getAllSettledReferral(): string
        {
            
            $response = $this->model->fetchAllReferrals(2);
            return Response::json($response);
        }

        function updatePaidReferral(int $referral_id, int $referredBy): string
        {
            $data = array("referral"=> 3, "user_id" => $referredBy);
            $res = $this->walletService->depositFundIntoReferralWallet($data);
            if($res){
                $response = $this->model->updateReferralStatus(2, $referral_id);
                if($response){
                    return Response::json("true", 200);
                }
            }
            return Response::json("Unable to locate and update the referral information!");
        }

        function updatePendingReferral(int $referral_id): string
        {
            $response = $this->model->updateReferralStatus(1, $referral_id);
            if($response){
                return Response::json("true", 200);
            }
            return Response::json("Unable to locate and update the referral information!");
        }

        function validateAndPayReferrer(int $investmentId): bool{
            $response = $this->model->getReferralbyInvestmentId($investmentId);
            if(count($response) > 4){
                $investment = (int) $response["referral_investment_id"];
                $id = (int) $response["referral_id"];
                $Rstatus = (int) $response["referral_status"];
                if($investment != 0 && $Rstatus == 0){
                    $minResponse = $this->updatePendingReferral($id);
                    if($minResponse) return true; 
                }
            }
            return false;
        }


    }

?>