<?php

namespace classes\models;

class Students extends ResourceModel
{
    var $collection = 'students';
    var $primaryKey = 'roll_no';
    var $connection = false;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
}
