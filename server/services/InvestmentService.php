<?php

namespace app\services;

use app\config\MysqlDBH;
use app\model\Investment;
use app\response\Response;
use app\services\impl\InvestmentServiceImpl;

    class InvestmentService implements InvestmentServiceImpl{
        private $model;

        function __construct() 
        {
            $mysqlConnector = new MysqlDBH();
            $this->model = new Investment($mysqlConnector);
        }

        function startAnInvestment(array $data): string
        {
            $response = $this->model->createInvestmentAccount($data);
            return $response ? Response::json("Investment has been created!", 201)
                                : Response::json("We are unable to create an investment now. Kindly contact an admin.", 500);
                                
        }

        function findAllInvestmentByUserId(int $id): string
        {
            $response = $this->model->fetchInvestmentsByUserId($id);
            return Response::json($response, 200);
        }
    }
?>