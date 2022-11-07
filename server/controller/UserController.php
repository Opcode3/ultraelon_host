<?php

namespace app\controller;

use app\requests\UserRequest;
use app\response\Response;
use app\services\UserService;
use Exception;

    class UserController{

        private $userService;

        function __construct()
        {
            $this->userService = new UserService();
        }

        function createNewUserAccount(UserRequest $userRequest){
            // return Response::json($userRequest->get(),201);
            return $this->userService->newUser($userRequest->get());
        } 


        function userLoginAuthentication($username, $password){
            return $this->userService->userAuthentication($username, $password);
        }

    }

?>