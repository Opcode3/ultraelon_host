<?php
namespace app\model;

use app\config\DatabaseHandler;

    class Withdraw extends BaseModel{

        private $table_name = 'withdraws_tb';

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
        }
        // new withdrawals

        function makeWithdrawal(array $userWithdrawInfo){
            $sql = "INSERT INTO $this->table_name(withdraw_slug, withdraw_amount, withdraw_account_type, withdraw_user_id, withdraw_address, withdraw_from)
                        VALUES(:withdraw_slug, :withdraw_amount, :withdraw_account_type, :withdraw_user_id, :withdraw_address, :withdraw_from)";
            $insert = $this->insert($sql, $userWithdrawInfo, "withdraw_slug");
            return $insert;
        }
        // find withdrawals by slug
        function fetchWithdrawsByUserId(int $id){
            $sql = "SELECT * FROM $this->table_name WHERE withdraw_user_id = ?";
            $response = $this->fetchMany($sql, [$id]);
            return $response;
        }

        function fetchWithdraws(int $id){
            $sql = "SELECT $this->table_name.*, users_tb.user_username, wallets_tb.wallet_invest, wallets_tb.wallet_ultra, wallets_tb.wallet_referral FROM $this->table_name LEFT JOIN users_tb ON $this->table_name.withdraw_user_id = users_tb.user_id LEFT JOIN wallets_tb ON $this->table_name.withdraw_user_id = wallets_tb.wallet_user_id WHERE withdraw_status = ?";
            $response = $this->fetchMany($sql, [$id]);
            return $response;
        }

        // find all withdrawals
        // update withdrawals
    }


?>