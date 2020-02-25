<?php
namespace JonathanMartz\WebApiLog\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Class Request
 * @package JonathanMartz\WebApiLog\Model
 */
class Request extends AbstractModel
{
    /**
     *
     */
    public function _construct()
    {
        $this->_init("JonathanMartz\WebApiLog\Model\ResourceModel\Resource");
    }
}

?>
