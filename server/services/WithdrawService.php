<?php

namespace app\services;

use app\config\MysqlDBH;
use app\model\Withdraw;
use app\response\Response;
use app\services\impl\WithdrawServiceImpl;

    class WithdrawService implements WithdrawServiceImpl{
        private $model;
        private $walletService;

        function __construct() 
        {
            $mysqlConnector = new MysqlDBH();
            $this->model = new Withdraw($mysqlConnector);
            $this->walletService = new WalletService();
        }

        function withdrawUsingWallet(array $data): string
        {
            $id = (int) $data["withdraw_user_id"];
            $amount = (int) $data["withdraw_amount"];
            $from = $data["withdraw_from"];
            if($from == "wallet_referral"){
                $response = $this->walletService->withdrawFundFromReferralAccount($id, $amount);
            }else if($from == "wallet_ultra"){
                $response = $this->walletService->withdrawFundFromUltraAccount($id, $amount);
            }else if($from == "wallet_invest"){
                $response = $this->walletService->withdrawFundFromInvestmentAccount($id, $amount);
            }
            if(is_int($response)){
                $withdrawResponse = $this->model->makeWithdrawal($data);
                if($withdrawResponse){
                    return Response::json("Your withdrawal was successful! We will notify you once the fund is transferred. Thanks again for choosing us.", 201);   
                }
                return Response::json("An error occured while registering withdrawals", 501);   
            
            }
            return Response::json("Oooops! $response Insufficient account balance in wallet!", 401);

        }

        function findAllWithdrawalByUserId(int $id): string
        {
            $response = $this->model->fetchWithdrawsByUserId($id);
            return Response::json($response, 200);
        }

        function findAllPendingWithdrawal(): string
        {
            $response = $this->model->fetchWithdraws(0);
            return Response::json($response, 200);   
        }

        function findAllPaidWithdrawal(): string
        {
            $response = $this->model->fetchWithdraws(1);
            return Response::json($response, 200);   
        }
    }
?>