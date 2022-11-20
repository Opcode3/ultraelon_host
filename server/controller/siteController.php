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
        function getFaqsByWithdraws(){ return $this->siteService->findFaqsByAffiliate();}
        function getStatistics(){ return $this->siteService->findStatistics();}
        function getTestimonies(){ return $this->siteService->findTestimony();}


        function setRecord(array $data){
            return $this->siteService->editRecord($data);
        }

        function setContact(array $data){
            return $this->siteService->editContact($data);
        }

        function setFaq(array $data){
            return $this->siteService->createFaq($data);
        }

        function setStatistic(array $data){
            return $this->siteService->createStatistic($data);
        }

        function setTestimony(array $data){
            return $this->siteService->createTestimony($data);
        }

        function updateFaq(array $data){ // update
            return $this->siteService->editFaqs($data);
        }
    }

?>