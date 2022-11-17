<?php

    namespace app\services\impl;
    
    interface InvestmentServiceImpl{
        function startAnInvestment(array $data): string;
        function findAllInvestmentByUserId(int $id): string;
        function findAllPendingInvestment(): string;
        function findAllPaidInvestment(): string;
        function findAllClosedInvestment(): string;
        function updatePendingInvestment(int $user_id): string;
        function updatePaidInvestment(int $user_id): string;
    }

?>