<?php

namespace app\model;

use app\config\DatabaseHandler;

    class Wallet extends BaseModel{

        private $table_name = 'wallets_tb';

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
        }

        // new wallet
        // find wallet by slug
        // find all wallet
        // update wallet
    }


?>