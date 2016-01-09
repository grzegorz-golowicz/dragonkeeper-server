<?php
namespace App\ResponseModel;

abstract class AbstractResponseModel
{
    protected $data = array();

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}