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
            return $res ? Response::json("New statistics has been created!", 201) : Response::json("Unable to create statistics.");
        }

        function findStatistics(): string
        {
            $res = $this->model->fetchStatistics();
            return Response::json($res, 200);
        }

        function createFaq(array $new): string
        {
            $res = $this->model->newFaq($new);
            return $res ? Response::json("New frequently asked question has been created!", 201) : Response::json("Unable to create faq.");
        }

        function findFaqs(): string
        {
            $res = $this->model->fetchFaqs();
            return Response::json($res, 200);
        }

        function editFaqs(array $new): string
        {
            $res = $this->model->updateContact($new);
            return $res ? Response::json("Platform contact was successfully updated!", 200) : Response::json("Platform contact was not updated.");
        }

    }

?>