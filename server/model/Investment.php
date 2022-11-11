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
            $sql = "INSERT INTO $this->table_name(invest_slug, invest_amount, invest_depositor_address, invest_user_id, invest_plan) 
                        VALUES(:invest_slug, :invest_amount, :invest_depositor_address, :invest_user_id, :invest_plan)";
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
        function fetchAllInvestments(){
            $sql = "SELECT * FROM $this->table_name";
            $response = $this->fetchMany($sql);
            return $response;
        }

        // update investment
    }


?>