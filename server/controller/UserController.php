<?php

namespace app\controller;

use app\requests\UserRequest;
use app\requests\UserUpdateRequest;
use app\response\Response;
use app\services\UserService;
use Exception;

    class UserController{

        private $userService;

        function __construct()
        {
            $this->userService = new UserService();
        }

        function fetchAllUsers(){
            return $this->userService->getUsers();
        }

        function createNewUserAccount(UserRequest $userRequest){
            // return Response::json($userRequest->get(),201);
            return $this->userService->newUser($userRequest->get());
        } 

        function editUserAccount(UserUpdateRequest $editRequest){
            if($editRequest->isValid()){
                return $this->userService->updateUserAccount($editRequest->get());
            }
            return Response::json("User update request data is incorrect.", 400);
        }


        function userLoginAuthentication($username, $password){
            return $this->userService->userAuthentication($username, $password);
        }


        function adminLoginAuthentication($username, $password){
            return $this->userService->adminAuthentication($username, $password);
        }



        // contact form

        function postSupportQueryForm(array $request){
            return $this->userService->createSupportRequest($request);
        }
        
        function fetchAllSupportQuery(){
            return $this->userService->getAllSupportRequest();
        }

    }

?>