<?php

    namespace app\services\impl;
    
    interface WithdrawServiceImpl{
        function withdrawUsingWallet(array $data): string;
        function findAllWithdrawalByUserId(int $id): string;
        function findAllPendingWithdrawal(): string;
        function findAllPaidWithdrawal(): string;
    }

?>