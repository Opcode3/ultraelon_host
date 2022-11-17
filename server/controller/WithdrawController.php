<?php

namespace app\controller;

use app\services\WithdrawService;

    class WithdrawController{

        private $withdrawService;

        function __construct()
        {
            $this->withdrawService = new WithdrawService();
        }

        function withdrawFund(array $withdrawPayload){
            return $this->withdrawService->withdrawUsingWallet($withdrawPayload);
        }

        function getAllWithdrawsByUserId(int $id){
            return $this->withdrawService->findAllWithdrawalByUserId($id);
        }

        function getAllPendingWithdraws(){
            return $this->withdrawService->findAllPendingWithdrawal();
        }

        function getAllPaidWithdraws(){
            return $this->withdrawService->findAllPaidWithdrawal();
        }

    }

?>