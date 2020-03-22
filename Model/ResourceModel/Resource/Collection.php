<?php

namespace JonathanMartz\WebApiLog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'JonathanMartz\WebApiLog\Model\Request',
            'JonathanMartz\WebApiLog\Model\ResourceModel'
        );
    }
}
