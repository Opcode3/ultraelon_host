<?php

namespace app\services;

use app\config\MysqlDBH;
use app\model\Wallet;
use app\response\Response;
use app\services\impl\WalletServiceImpl;

    class WalletService implements WalletServiceImpl{
        private $model;

        function __construct() 
        {
            $mysqlConnector = new MysqlDBH();
            $this->model = new Wallet($mysqlConnector);
        }

        function findUserWalletById(int $user_id)
        {
            $response = $this->model->fetchWalletByUserId($user_id);
            return Response::json($response, 200);
        }

        function findAllWallet()
        {
            $response = $this->model->fetchAllWallet();
            return Response::json($response, 200);
        }

        function withdrawFundFromInvestmentAccount(int $id, int $amount)
        {
            $response = $this->model->reduceWalletAccount($id, $amount, "wallet_invest");
            return $response;   
        }

        function withdrawFundFromReferralAccount(int $id, int $amount)
        {
            $response = $this->model->reduceWalletAccount($id, $amount, "wallet_referral");
            return $response;
        }

        function withdrawFundFromUltraAccount(int $id, int $amount)
        {
            $response = $this->model->reduceWalletAccount($id, $amount, "wallet_ultra");
            return $response;
        }

        
    }
?>