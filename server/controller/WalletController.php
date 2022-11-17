<?php

namespace app\controller;

use app\services\WalletService;

    class WalletController{

        private $walletService;

        function __construct()
        {
            $this->walletService = new WalletService();
        }

        function getUserWalletAmount(int $user_id){
            return $this->walletService->findUserWalletById($user_id);
        }

        function getAllWallets(){
            return $this->walletService->findAllWallet();
        }

    }

?>