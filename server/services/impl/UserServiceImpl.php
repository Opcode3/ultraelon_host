<?php

    namespace app\services\impl;
    
    interface UserServiceImpl{
        function newUser(array $data): string;
        function getUsers(): string;
        function updateUserAccount(array $userUpdateRequest): string;
        function userAuthentication(string $username, string $password): string;
        function createSupportRequest(array $supportRequest): string;
    }

?>