<?php

namespace classes\models;

class Teachers extends ResourceModel
{
    var $collection = 'teachers';
    var $primaryKey = 'id';
    var $connection = false;
    public function  __construct($connection)
    {
        $this->connection = $connection;
    }
}
