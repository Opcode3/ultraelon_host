<?php

namespace app\model;

use app\config\DatabaseHandler;
use app\config\PasswordConfig;

    class User extends BaseModel{

        private $table_name = 'users_tb';

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);

        }

        // add new user
        function newUser(array $new_user){

            if( $this->isUserExist($new_user["user_username"], $new_user["user_email"]) ){
                $new_user["user_password"] = PasswordConfig::encodePassword($new_user["user_password"]);
                $sql = "INSERT INTO $this->table_name(user_slug, user_username, user_email, user_password) VALUES(:user_slug, :user_username, :user_email, :user_password)";
                $response = $this->insert($sql, $new_user, "user_slug");
                return $response;
            }
            return "exist";
        }

        //fetch users
        function findAllUser(): array{
            $sql = "SELECT * FROM $this->table_name";
            $response = $this->fetch($sql);
            return $response;
        }

        //fetch user
        function findUser(string $slug ): array{
            $sql = "SELECT * FROM $this->table_name WHERE user_slug=?";
            $response = $this->fetch($sql, [$slug]);
            return $response;
        }

        //fetch user
        function findUserByUsername(string $username): array{
            $sql = "SELECT * FROM $this->table_name WHERE user_username=?";
            $response = $this->fetch($sql, [$username]);
            return $response;
        }

        // add new admin
        // update user

        //return user_id from username
        function findUserIdFromUsername(string $username): string{
            $sql = "SELECT user_id from $this->table_name WHERE user_username = ?";
            $payload = [$username];
            $response = $this->fetch($sql, $payload);
            return $response["user_id"];
        }


        // check for user
        private function isUserExist($username, $email){
            $sql = "SELECT user_slug from $this->table_name WHERE user_username = ? OR user_email=?";
            $payload = [$username, $email];
            $stmt = $this->query($sql, $payload);
            return $stmt->rowCount() == 0; 
        }
       
    }

?>
