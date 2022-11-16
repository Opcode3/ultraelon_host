<?php
    namespace app\services\impl;
    interface WalletServiceImpl{
        function findUserWalletById(int $user_id);
        function withdrawFundFromReferralAccount(int $id, int $amount);
        function withdrawFundFromInvestmentAccount(int $id, int $amount);
        function withdrawFundFromUltraAccount(int $id, int $amount);
        function findAllWallet();
        function depositFundIntoWallet(array $walletInformation): bool;
    }

?>