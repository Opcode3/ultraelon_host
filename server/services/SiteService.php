<?php

    namespace app\services;

use app\config\MysqlDBH;
use app\model\Site;
use app\response\Response;
use app\services\impl\SiteServiceImpl;

    class SiteService implements SiteServiceImpl{

        private $model;

        function __construct() 
        {
            $mysqlConnector = new MysqlDBH();
            $this->model = new Site($mysqlConnector);
        }

        function findRecord(): string
        {
            $res = $this->model->fetchRecord();
            return Response::json($res, 200);
        }

        function editRecord(array $new): string
        {
            $res = $this->model->updateRecord($new);
            return $res ? Response::json("Record was updated successfully!", 200) : Response::json("Record was not updated.");
        }

        function findContact(): string
        {
            $res = $this->model->fetchContact();
            return Response::json($res, 200);
        }

        function editContact(array $new): string
        {
            $res = $this->model->updateContact($new);
            return $res ? Response::json("Platform contact was successfully updated!", 200) : Response::json("Platform contact was not updated.");
        }

        function createStatistic(array $new): string
        {
            $res = $this->model->newStatistics($new);
            if(is_bool($res)){
                return $res ? Response::json("New statistics has been created!", 201) : Response::json("Unable to create statistics.");
            }
            return Response::json("This statistics has already been created!", 200);
        }

        function findStatistics(string $type): string
        {
            $res = $this->model->fetchStatistics($type);
            return Response::json($res, 200);
        }

        function createFaq(array $new): string
        {
            $res = $this->model->newFaq($new);
            if(is_bool($res)){
                return $res ? Response::json("New frequently asked question has been created!", 201) : Response::json("Unable to create faq.");
            }
            return Response::json("This frequently asked question has already been created!", 200);
        }

        function findFaqs(): string
        {
            $res = $this->model->fetchFaqs();
            return Response::json($res, 200);
        }

        function findFaqsByAffiliate(): string
        {
            $res = $this->model->fetchFaqsForWithdrawal();
            return Response::json($res, 200);
        }

        function editFaqs(array $new): string
        {
            $res = $this->model->updateContact($new);
            return $res ? Response::json("Platform contact was successfully updated!", 200) : Response::json("Platform contact was not updated.");
        }

        function deleteFaqs(string $slug): string
        {
            $res = $this->model->deleteFaq($slug);
            if($res){
                return Response::json("FAQ was deleted", 200);
            }
            return Response::json("Unable to delete FAQ");
        }

        function createTestimony(array $new): string
        {
            $res = $this->model->newTestimony($new);
            if(is_bool($res)){
                return $res ? Response::json("A new testimony has been created!", 201) : Response::json("Unable to create testmony.");
            }
            return Response::json("This testimony has already been created!", 200);
        }

        function findTestimony(): string
        {
            $res = $this->model->fetchTestimony();
            return Response::json($res, 200);
        }

        function deleteTestimony(string $slug): string
        {
            $res = $this->model->deleteTestimony($slug);
            if($res){
                return Response::json("Testimony was deleted", 200);
            }
            return Response::json("Unable to delete testimony!");
        }

    }

?>