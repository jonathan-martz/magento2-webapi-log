<?php

namespace JonathanMartz\WebApiLog\Model\ResourceModel\Request;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollecstion
{
    protected function _construct()
    {
        $this->_init(
            'JonathanMartz\WebApiLog\Model\Request',
            'JonathanMartz\WebApiLog\Model\ResourceModel\Request'
        );
    }
}
