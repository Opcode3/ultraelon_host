<?php
namespace app\model;

use app\config\DatabaseHandler;

    class Investment extends BaseModel{

        private $table_name = 'investments_tb';

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
        }

        // new Investment
        function createInvestmentAccount(array $data){
            $sql = "INSERT INTO $this->table_name(invest_slug, invest_amount, invest_depositor_address, invest_depositor_account_type, invest_user_id, invest_plan) 
                        VALUES(:invest_slug, :invest_amount, :invest_depositor_address, :invest_depositor_account_type, :invest_user_id, :invest_plan)";
            $insert = $this->insert($sql, $data, "invest_slug");
            return $insert;
        }
        // find investment by user id
        function fetchInvestmentsByUserId(int $user_id){
            $sql = "SELECT * FROM $this->table_name WHERE invest_user_id = ?";
            $response = $this->fetchMany($sql, [$user_id]);
            return $response;
        }
        // find all investment
        function fetchAllInvestments(int $status){
            $sql = "SELECT $this->table_name.*, users_tb.user_username FROM $this->table_name LEFT JOIN users_tb ON $this->table_name.invest_user_id = users_tb.user_id WHERE invest_status=?";
            $response = $this->fetchMany($sql, [$status]);
            return $response;
        }

        // update investment
        function updateInvestmentStatus($investorId, $status){
            $sql = "UPDATE $this->table_name SET invest_status=? WHERE invest_user_id=?";
            $response = $this->update($sql, [$status, $investorId]);
            return $response;
        }
    }


?>