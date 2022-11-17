<?php
namespace app\model;

use app\config\DatabaseHandler;

    class Investment extends BaseModel{

        private $table_name = 'investments_tb';
        private $dbconnector;

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
            $this->dbconnector = $databaseHandler->connection();
        }

        // new Investment
        function createInvestmentAccount(array $data){
            $sql0 = "INSERT INTO $this->table_name(invest_slug, invest_amount, invest_depositor_address, invest_depositor_account_type, invest_user_id, invest_plan) 
                        VALUES(:invest_slug, :invest_amount, :invest_depositor_address, :invest_depositor_account_type, :invest_user_id, :invest_plan)";
            $data["invest_slug"] = uniqid(time());
            $stmt0 = $this->dbconnector->prepare($sql0);
            $stmt0->execute($data);
            if($stmt0->rowCount() == 1){
                $sql1 = "SELECT * from referrals_tb WHERE referral_user_id = ? AND referral_status = ? AND referral_investment_id = ?";
                $stmt1 = $this->fetch($sql1, [$data["invest_user_id"], 0, 0]);
                if(count($stmt1) > 4){
                    // update referral field
                    $referralId = $stmt1["referral_id"];
                    $sql2 = "SELECT * FROM $this->table_name WHERE invest_slug = ?";
                    $stmt2 = $this->fetch($sql2, [$data["invest_slug"]]);
                    if(count($stmt2) > 3){
                        $investId = (int) $stmt2["invest_id"];
                        $sql = "UPDATE referrals_tb SET referral_investment_id= :investId, updatedAt= :updatedAt WHERE referral_id= :referId";
                        $stmt = $this->update($sql, array( "investId"=>$investId, "referId" => $referralId));
                        if($stmt){
                            return true;
                        }
                    }
                }else{
                    return true;
                }
            }
            return false;
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
            $sql = "UPDATE $this->table_name SET invest_status= :status, updatedAt = :updatedAt WHERE invest_id=:id";
            $response = $this->update($sql, array("status"=>$status, "id"=>$investorId));
            return $response;
        }
    }


?>