<?php
namespace JonathanMartz\WebApiLog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Resource
 * @package JonathanMartz\WebApiLog\Model\ResourceModel
 */
class Resource extends AbstractDb
{
    /**
     *
     */
    public function _construct()
    {
        $this->_init("webapi_log", "id");
    }
}

?>
