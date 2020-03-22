<?php
namespace JonathanMartz\WebApiLog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Request
 * @package JonathanMartz\WebApiLog\Model\ResourceModel
 */
class Request extends AbstractDb
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
