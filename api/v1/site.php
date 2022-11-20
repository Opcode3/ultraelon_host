<?php

use app\controller\SiteController;
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

    if($method_type == 'DELETE'){ 
        $request_data = json_decode($request_body, true);
        $siteController = new SiteController();

        if($request_data["type"] == "faq"){
            $slug = $request_data["slug"];
            $res = $siteController->removeFaq($slug);
            echo $res;
        }else if($request_data["type"] == "testimony"){
            $slug = $request_data["slug"];
            $res = $siteController->removeTestimony($slug);
            echo $res;
        }else{
            echo Response::json("You are not authorized to access this endpoint!", 301);
        }
    }else{
        echo Response::json("You are not authorized to access this endpoint!", 301);
    }
?>