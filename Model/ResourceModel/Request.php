<?php
namespace JonathanMartz\WebApiLog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Magento\Framework\Model\ResourceModel\Db\Context;

class Request extends AbstractDb
{	
	protected function _construct()
	{
		$this->_init('webapi_log', 'id');
	}
}