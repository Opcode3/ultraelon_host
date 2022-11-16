<?php

namespace app\controller;

use app\services\InvestmentService;

    class InvestmentController{

        private $investmentService;

        function __construct()
        {
            $this->investmentService = new InvestmentService();
        }

        function registerInvestment(array $payload){
            return $this->investmentService->startAnInvestment($payload);
        }

        function getAllInvestmentByUserId(int $id){
            return $this->investmentService->findAllInvestmentByUserId($id);
        }

        function getAllPendingInvestment(){
            return $this->investmentService->findAllPendingInvestment();
        }
        
        function getAllPaidInvestment(){
            return $this->investmentService->findAllPaidInvestment();
        }

        function getAllClosedInvestment(){
            return $this->investmentService->findAllClosedInvestment();
        }

        function updatePendingInvestmentPlan(int $user_id){
            return $this->investmentService->updatePendingInvestment($user_id);
        }

        function updatePaidInvestmentPlan(int $user_id, array $walletProfit){
            return $this->investmentService->updatePaidInvestment($user_id, $walletProfit);
        }

    }

?>