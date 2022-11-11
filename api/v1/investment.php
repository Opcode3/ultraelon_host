<?php

use app\controller\InvestmentController;
use app\response\Response;

require dirname(__DIR__)."../../vendor/autoload.php";

header("Access-Control-Allow-Origin: same");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    $method_type = $_SERVER['REQUEST_METHOD'];
    $request_body = file_get_contents('php://input');

    if($method_type == 'POST'){ 
        $request_data = json_decode($request_body, true);
        if(array_key_exists("from", $request_data)){
            
            if( $request_data["from"] == "invest_1"){
                session_start();            
                $amount = (int) $request_data["amount"];
                $address = $request_data["address"];
                $plan = $request_data["plan"];
                $user_id = (int) $_SESSION["userDetails"]["user_id"]; 

                if($user_id > 0){
                    $investPayload = array(
                        "invest_user_id" => $user_id, "invest_amount" => $amount,
                        "invest_depositor_address" => $address, 
                        "invest_plan" => $plan
                    );
                    // echo Response::json($investPayload, 201);
                    $investmentController = new InvestmentController();
                    $reponseToInvestment = $investmentController->registerInvestment($investPayload);
                    echo $reponseToInvestment;    
                }else{
                    echo Response::json("Oooops! we are not able to validate the user at the monent. Try logout and login in again..");
                }
            }else{
                echo Response::json("Oooops! we are not able to validate the user at the monent. Try logout and login in again..");
            }
    
        }else{
            echo Response::json("No withdraw verification token present in request data..");
        }
        
    }else{
        echo Response::json("You are not authorized to access this endpoint!", 301);
    }



        // if($request_data["type"] == "withdraws"){
        //     if(count($request_data) == 3){
        //         $response = $userController->userLoginAuthentication(
        //             $request_data["username"], $request_data["password"]
        //         );

        //     }else{
        //         echo Response::json("Your request payload is not valid!", 301);
        //     }
        // }
?>