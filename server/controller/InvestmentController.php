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

    }

?>