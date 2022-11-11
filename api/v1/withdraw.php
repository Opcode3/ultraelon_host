<?php

use app\controller\WithdrawController;
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
        if(array_key_exists("jwt", $request_data)){
            $jwt = $request_data["jwt"];
            if(password_verify("JesusIsLordOfGlory", $jwt)){
                session_start();
                $amount = (int) $request_data["amount"];
                $type = $request_data["type"];
                $user_id = $_SESSION["userDetails"]["user_id"];
                $walletAddress = "user_$type";
                $withdraw_address = $_SESSION["userDetails"][$walletAddress];
                $fromWalletName = "wallet_".$request_data["from"];
                $fromWallet = (int) $_SESSION[$fromWalletName];
                if($fromWallet > 10 && ($fromWallet - $amount) >= 0){
                    // echo Response::json("good");
                    if(strlen(trim($withdraw_address)) < 5){
                        echo Response::json("No wallet address has been specified for the account type. Try inputting an address from the setting tab.");
                    }else{
                        $withdrawPayload = array(
                            "withdraw_amount" => $amount,
                            "withdraw_account_type" => $type,
                            "withdraw_user_id" => $user_id,
                            "withdraw_address" => $withdraw_address,
                            "withdraw_from" => $fromWalletName
                        );
                        $withdrawController = new WithdrawController();
                        $reponseToWithdraw = json_decode($withdrawController->withdrawFund($withdrawPayload), true);
                        if($reponseToWithdraw["status_code"] == 201){
                            $_SESSION[$fromWalletName] = ($fromWallet - $amount);
                        }
                        echo Response::json($reponseToWithdraw["message"], $reponseToWithdraw["status_code"]);
                        
                        // echo Response::json($withdrawPayload, 201);
                    }
                }else{
                    echo Response::json("Oooops! Insufficient account balance in wallet.");
                }
                // }
            }else{
                echo Response::json("withdraw verification failed. Try again or contact platform admin.");
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