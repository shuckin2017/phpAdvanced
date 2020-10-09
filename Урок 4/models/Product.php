<?php

namespace app\models;

class Product extends Record
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $vendor_id;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $vendor_id
     */
    public function __construct($id = null, $name = null, $description = null, $price = null, $vendor_id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->vendor_id = $vendor_id;
    }


    public static  function getTableName():string
    {
        return 'products';
    }
}