<?php

namespace app\services;

use app\config\MysqlDBH;
use app\model\Investment;
use app\response\Response;
use app\services\impl\InvestmentServiceImpl;

    class InvestmentService implements InvestmentServiceImpl{
        private $model;
        // private $userModel
        private $referralService;
        private $walletService;

        function __construct() 
        {
            $mysqlConnector = new MysqlDBH();
            $this->model = new Investment($mysqlConnector);
            $this->referralService = new ReferralService();
            $this->walletService = new WalletService();
        }

        function startAnInvestment(array $data): string
        {
            $response = $this->model->createInvestmentAccount($data);
            return $response ? Response::json("Investment has been created!", 201)
                                : Response::json("We are unable to create an investment now. Kindly contact an admin.", 500);
                                
        }

        function findAllInvestmentByUserId(int $id): string
        {
            $response = $this->model->fetchInvestmentsByUserId($id);
            return Response::json($response, 200);
        }

        function findAllPendingInvestment(): string
        {
            $response = $this->model->fetchAllInvestments(0);
            return Response::json($response, 200);
        }

        function findAllPaidInvestment(): string
        {
            $response = $this->model->fetchAllInvestments(1);
            return Response::json($response, 200);
        }

        function findAllClosedInvestment(): string
        {
            $response = $this->model->fetchAllInvestments(2);
            return Response::json($response, 200);
        }


        function updatePendingInvestment(int $investmentId): string
        {
            $response = $this->model->updateInvestmentStatus($investmentId, 1);
            if($response){
                // update referral if exist.
                $res = $this->referralService->validateAndPayReferrer($investmentId);
                if($res){
                    return Response::json("User Investment Plan was updated successfully alongside the referrer", 200);
                }
                return Response::json("User Investment Plan was updated successfully", 200);
            }
            return Response::json("An error was encountered While trying to update user investment plan. Try again or notify the developer of this software.");
        }

        function updatePaidInvestment(int $investmentId, array $walletData): string
        {
            // credit to investor wallet
            $res = $this->walletService->depositFundIntoWallet($walletData);
            if($res){
                $response = $this->model->updateInvestmentStatus($investmentId, 2);
                if($response){
                    return Response::json("User Investment Plan was updated successfully", 200);
                }
                return Response::json("An error was encountered While trying to update user investment plan. Try again or notify the developer of this software.");
            }
            return Response::json("Unable to deposit fund into investors account due to an error. Contact the developer.");
        }
    }
?>