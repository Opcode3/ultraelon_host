<?php

namespace app\model;

use app\config\DatabaseHandler;

    class Site extends BaseModel{
        /**
         * record_site_tb
         * contact_site_tb
         * faq_site_tb
         * statistic_site_tb
         */

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
        }

        // update all modal
        function updateRecord(array $payload){
            $sql = "UPDATE record_site_tb SET 
                    record_investor = :investor, record_deposit = :deposit, record_withdrawal = :withdrawal, 
                    updatedAt = :updatedAt WHERE record_id = :id";
            return $this->update($sql, $payload);
        }

        function updateContact(array $payload){
            $sql = "UPDATE contact_site_tb SET 
                    contact_address = :address, contact_email = :email, contact_whatsapp = :whatsapp, 
                    updatedAt = :updatedAt WHERE contact_id = :id";
            return $this->update($sql, $payload);
        }

        function updateFaq(array $payload){
            $sql = "UPDATE faq_site_tb SET 
                    faq_title = :title, faq_content = :content, 
                    updatedAt = :updatedAt WHERE faq_slug = :slug";
            return $this->update($sql, $payload);
        }


        // create all modal

        function newStatistics(array $statistic){
            // if( $this->isStatisticExist($statistic["title"]) ){
            $sql = "INSERT INTO statistic_site_tb(statistic_slug, statistic_type, statistic_wallet_type, statistic_amount, statistic_investor_name) 
                    VALUES(:slug, :type, :wallet_type, :amount, :investor_name)";
            $response = $this->insert($sql, $statistic, "slug");
            return $response;
            // }
            // return "exist";
        }

        function newFaq(array $faq){
            if( $this->isFaqExist($faq["title"]) ){
                $sql = "INSERT INTO faq_site_tb(faq_slug, faq_title, faq_content, faq_affiliate) 
                        VALUES(:slug, :title, :content, :affiliate)";
                $response = $this->insert($sql, $faq, "slug");
                return $response;
            }
            return "exist";
        }

        function newTestimony(array $testimony){
            if( $this->isTestimonyExist($testimony["name"], $testimony["country"]) ){
                $sql = "INSERT INTO testimony_site_tb(testimony_slug, testimony_name, testimony_country, testimony_message) 
                        VALUES(:slug, :name, :country, :message)";
                $response = $this->insert($sql, $testimony, "slug");
                return $response;
            }
            return "exist";
        }

        // delete all

        function deleteFaq(int $faqId){
            // $sql = "DELETE "
        }


        // fetch all
        function fetchRecord(){
            $sql = "SELECT * FROM record_site_tb WHERE record_id = :id";
            return $this->fetch($sql, array("id" => 1));
        }

        function fetchContact(){
            $sql = "SELECT * FROM contact_site_tb WHERE contact_id = :id";
            return $this->fetch($sql, array("id" => 1));
        }
        function fetchStatistics(){
            $sql = "SELECT * FROM statistic_site_tb";
            return $this->fetchMany($sql);
        }

        function fetchFaqs(){
            $sql = "SELECT * FROM faq_site_tb";
            return $this->fetchMany($sql);
        }

        function fetchTestimony(){
            $sql = "SELECT * FROM testimony_site_tb";
            return $this->fetchMany($sql);
        }

        function fetchFaqsForWithdrawal(){
            $sql = "SELECT * FROM faq_site_tb WHERE faq_affiliate=1";
            return $this->fetchMany($sql);
        }




        // private help function

        private function isStatisticExist(string $statisticTitle): bool{
            $sql = "SELECT statistic_slug from statistic_site_tb WHERE statistic_title = ?";
            $stmt = $this->query($sql, [$statisticTitle]);
            return $stmt->rowCount() == 0; 
        } // not necessary

        private function isFaqExist(string $faqTitle): bool{
            $sql = "SELECT faq_slug from faq_site_tb WHERE faq_title = ?";
            $stmt = $this->query($sql, [$faqTitle]);
            return $stmt->rowCount() == 0; 
        }
        
        private function isTestimonyExist(string $name, string $country): bool{
            $sql = "SELECT testimony_slug from testimony_site_tb WHERE testimony_country = ? AND testimony_name = ?";
            $stmt = $this->query($sql, [$country, $name]);
            return $stmt->rowCount() == 0; 
        }  
       
    }

?>
