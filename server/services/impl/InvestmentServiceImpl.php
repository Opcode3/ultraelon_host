<?php

    namespace app\services\impl;
    
    interface InvestmentServiceImpl{
        function startAnInvestment(array $data): string;
        function findAllInvestmentByUserId(int $id): string;
    }

?>