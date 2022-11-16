<?php

namespace app\model;

use app\config\DatabaseHandler;

    class Wallet extends BaseModel{

        private $table_name = 'wallets_tb';
        private $dbconnector;

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
            $this->dbconnector = $databaseHandler->connection();

        }

        // new wallet
        function newWallet(int $id){
            $sql = "INSERT INTO $this->table_name(wallet_slug, wallet_user_id) VALUES(:wallet_slug, :wallet_user_id)";
            $response = $this->insert($sql, array("wallet_user_id" => $id), "wallet_slug");
            return $response;
        }
        // find wallet by slug
        // find wallet by user_id
        function fetchWalletByUserId(int $id){
            $sql = "SELECT * FROM $this->table_name WHERE wallet_user_id=?";
            $stmt = $this->query($sql, [$id]);
            if($stmt->rowCount() == 0){
                // create account
                $response = $this->newWallet($id);
                if($response == false){
                    return "An error was encountered while trying to register wallet.";
                }
                $stmt = $this->query($sql, [$id]);
            }
            return $this->fetch($sql, [$id]);
        }


        // find all wallet
        function fetchAllWallet(){
            $sql = "SELECT users_tb.*, $this->table_name.wallet_invest, $this->table_name.wallet_ultra, $this->table_name.wallet_referral FROM $this->table_name LEFT JOIN users_tb ON users_tb.user_id = $this->table_name.wallet_user_id";
            return $this->fetchMany($sql);
        }

        // reduce account from::::::
        function reduceWalletAccount(int $id, int $amount, string $from){
            $sql = "SELECT $from from $this->table_name WHERE wallet_user_id = ?";
            $stmt = $this->query($sql, [$id]);
            if($stmt->rowCount() == 1){
                $datas = $stmt->fetch();
                $balance = (int) $datas[$from];
                $newBalance = ($balance - $amount);
                if($newBalance >= 0){
                    $data = array("newBalance" => $newBalance, "wallet_user_id"=> $id);
                    $sql = "UPDATE $this->table_name SET $from =:newBalance, updatedAt=:updatedAt WHERE wallet_user_id = :wallet_user_id";
                    $updateResponse = $this->update($sql, $data);
                    // echo($sql);
                    if($updateResponse) return $newBalance;
                }
            }
            return false;
        }

        function depositInvestmentFundForInvestor(array $data){ // both invest and ultra
            $invest = floatval($data["wallet_invest"]);
            $ultra = floatval($data["wallet_ultra"]);
            $user_id = floatval($data["wallet_user_id"]);
            $updatedAt = date("Y-m-d h:i:s");

            $sql = "UPDATE $this->table_name SET wallet_invest = wallet_invest + ?,  wallet_ultra = wallet_ultra + ?, updatedAt=? WHERE wallet_user_id = ?";
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->execute([$invest, $ultra, $updatedAt, $user_id]);
            return ($stmt->rowCount() == 1);
        }

        // adding fund to referral 
        function depositInvestmentFundIntoReferral(array $data){            
            $sql = "UPDATE $this->table_name SET wallet_referral = wallet_referral + :referral, updatedAt = :updatedAt WHERE wallet_user_id = :user_id";
            $res = $this->update($sql, $data);
            return $res;
        }
        
        // find all wallet
        // update wallet
    }


?>