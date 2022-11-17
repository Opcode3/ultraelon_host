<?php

namespace app\services;

use app\config\MysqlDBH;
use app\model\Investment;
use app\response\Response;
use app\services\impl\InvestmentServiceImpl;

    class InvestmentService implements InvestmentServiceImpl{
        private $model;
        // private $userModel

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

        function findAllPendingInvestment(): string
        {
            $response = $this->model->fetchAllInvestments(0);
            return Response::json($response, 200);
        }

        function findAllPaidInvestment(): string
        {
            $response = $this->model->fetchAllInvestments(1);
            return Response::json($response, 200);
        }

        function findAllClosedInvestment(): string
        {
            $response = $this->model->fetchAllInvestments(2);
            return Response::json($response, 200);
        }


        function updatePendingInvestment($user_id): string
        {
            $response = $this->model->updateInvestmentStatus($user_id, 1);
            if($response){
                return Response::json("User Investment Plan was updated successfully", 200);
            }
            return Response::json("An error was encountered While trying to update user investment plan. Try again or notify the developer of this software.");
        }

        function updatePaidInvestment(int $user_id): string
        {
            $response = $this->model->updateInvestmentStatus($user_id, 2);
            if($response){
                return Response::json("User Investment Plan was updated successfully", 200);
            }
            return Response::json("An error was encountered While trying to update user investment plan. Try again or notify the developer of this software.");
        }
    }
?>