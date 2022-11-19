<?php

namespace app\controller;

use app\services\SiteService;

    class SiteController{

        private $siteService;

        function __construct()
        {
            $this->siteService = new SiteService();
        }

        function getRecord(){return $this->siteService->findRecord();}
        function getContact(){ return $this->siteService->findContact();}
        function getFaqs(){ return $this->siteService->findFaqs();}
        function getStatistics(){ return $this->siteService->findStatistics();}

        function setRecord(array $data){
            if(count($data) == 4){

            }
            // record_investor = :investor, record_deposit = :deposit, record_withdrawal = :withdrawal, 
            //         updatedAt = :updatedAt WHERE record_id = :id";
        }


    }

?>