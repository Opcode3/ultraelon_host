<?php
namespace app\model;

use app\config\DatabaseHandler;
// investment plans model
    class Plan extends BaseModel{

        private $table_name = 'plans_tb';

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
        }

        // new plan
        // find plan by slug
        // find all plans
        // update plan
        //delete plan
    }


?>