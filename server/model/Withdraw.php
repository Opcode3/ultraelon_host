<?php
namespace app\model;

use app\config\DatabaseHandler;

    class Withdraw extends BaseModel{

        private $table_name = 'withdraws_tb';

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
        }

        // new withdrawals
        // find withdrawals by slug
        // find all withdrawals
        // update withdrawals
    }


?>