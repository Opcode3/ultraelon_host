<?php

use app\controller\ReferralController;
use app\controller\UserController;
use app\controller\WithdrawController;
use app\requests\UserRequest;
use app\response\Response;

require dirname(__DIR__)."../../vendor/autoload.php";
// echo json_encode(array("name" => "Emmanuel Emeka", "url" => dirname(__DIR__)."/../vendor/autoload.php"));

header("Access-Control-Allow-Origin: same");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    $method_type = $_SERVER['REQUEST_METHOD'];
    $request_body = file_get_contents('php://input');


    if($method_type == 'POST'){ 
        $request_data = json_decode($request_body, true);
        $withdrawController = new WithdrawController();
        if($request_data["type"] == "withdraw"){
            if(count($request_data) == 2){
                $userId = (int) $request_data["userId"];
                $response = $withdrawController->payInvestors($userId);
                echo $response;
            }else{
                echo Response::json("Your request payload is not valid!", 301);
            }
            // echo Response::json($request_data, 401);
        }
    }else{
        echo Response::json("You are not authorized to access this endpoint!", 301);
    }

?>