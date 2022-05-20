<?php

namespace classes\models;

abstract class ResourceModel
{
    public $primaryKey = 'id';
    public $data = [];
    var $collection = '';
    var $connection = false;

    public function createID($id)
    {
        return new \MongoDB\BSON\ObjectID($id);
    }

    public function load()
    {
        return $this->connection->selectCollection('test', $this->collection)->find()->toArray();
    }

    public function save()
    {
        $this->connection->selectCollection('test', $this->collection)->insertOne($this->data);
    }

    public function update($id)
    {
        $id = $this->createID($id);

        $res = $this->connection->selectCollection('test', $this->collection)->updateOne(
            [
                '_id' => $id
            ],
            ['$set' => $this->data]
        );
    }

    public function delete($id)
    {

        $this->connection->selectCollection('test', $this->collection)->deleteOne(['_id' => $this->createID($id)]);
    }


    //magic methods

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        if ($name == $this->primaryKey) {
            $this->attributes['_id'] = $value;
        }
    }

    public function __get($name)
    {
        return "hello";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    public function __call($method, $args = [])
    {

        if (substr($method, 0, 3) == 'set') {
            $this->__set(substr($method, 3), $args[0]);
        }
        if (substr($method, 0, 3) == 'get') {
            return "hello";
            $this->__get(substr($method, 3));
        }
    }
}
