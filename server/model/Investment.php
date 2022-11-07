<?php
namespace app\model;

use app\config\DatabaseHandler;

    class Investment extends BaseModel{

        private $table_name = 'investments_tb';

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
        }

        // new Investment
        // find investment by slug
        // find all investment
        // update investment
    }


?>