<?php

    namespace app\response;

    class Response{
        // public static function json($data, int $http_status_code = 200){
        //     header("http/1.1 $http_status_code");
        //     return json_encode([ "message" => $data]);
        // }

        static function json($data, int $status = 404){
            return json_encode([ "message" => $data, "status_code" => $status]);
        }

    }