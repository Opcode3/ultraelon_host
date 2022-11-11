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
        // find all withdrawals
        // update withdrawals
    }


?>