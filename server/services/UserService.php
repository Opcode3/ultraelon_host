<?php

    namespace app\services;

use app\config\MysqlDBH;
use app\config\PasswordConfig;
use app\model\Referral;
use app\model\User;
use app\response\Response;
use app\services\impl\ReferralServiceImpl;
use app\services\impl\UserServiceImpl;

    class UserService implements UserServiceImpl{

        private $model;
        private $referralService;

        function __construct() 
        {
            $mysqlConnector = new MysqlDBH();
            $this->model = new User($mysqlConnector);
            $this->referralService = new ReferralService();
        }

        function newUser(array $data): string 
        {
            $referredBy = array_pop($data);
            $username = $data["user_username"];

            $response = $this->model->newUser($data);
            if(is_bool($response)){
                if($response){
                    // register referrer

                    if($referredBy != "nil"){
                        $userID = $this->getUserIDByUsername($username);
                        $getReferredBy = $this->model->findUser($referredBy);
                        $referralPayload = array(
                            "referredby"=> (int) $getReferredBy["user_id"],
                            "new_user_id" => (int) $userID 
                        );
                        $response = $this->referralService->newReferral($referralPayload);
                    }
                    
                    return Response::json("New User registration was successful!", 201);
                }
                return Response::json("An error was encountered while trying to register user details!", 500);
            }
            return Response::json("The user detail already exist in our system!", 302);
        }

        function getUsers(): string
        {
            $response = $this->model->findAllUser();
            return Response::json($response);
        }

        function getUser(string $slug): string
        {
            $response = $this->model->findUser($slug);
            return Response::json($response);
        }

        function updateUserAccount(array $userUpdateRequest): string
        {
            $response = $this->model->updateUserAccountSetting($userUpdateRequest);
            if(is_array($response) && count($response) > 3){
                return Response::json($response, 200);
            }
            return Response::json($response, 500);
        }


        function userAuthentication(string $username, string $password): string{
            $response = $this->model->findUserByUsername($username);
            if(count($response) > 4){
                $passwordHash = $response["user_password"];
                if(PasswordConfig::decodePassword($password, $passwordHash)){
                    return Response::json($response, 200);
                }
                return Response::json("Your password is not recognized!");
            }
            return Response::json("Your username is not recognized!");
        }


        // for contact form functionalities
        function createSupportRequest(array $supportRequest): string
        {
            $response = $this->model->newSupportQuery($supportRequest);
            if($response){
                return Response::json("Support message was sent. Thank you for reaching out to us. We truly appreciate.", 201);
            }
            return Response::json("An error was encountered while trying to submit support. Please try again later.");
        }

        private function getUserIDByUsername(string $username){
            $response = $this->model->findUserIdFromUsername($username);
            return $response;
        }




    }

?>