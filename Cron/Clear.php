<?php

namespace JonathanMartz\WebApiLog\Cron;

use JonathanMartz\WebApiLog\Model\RequestFactory;

class Clear
{

    /**
     * @var RequestFactory
     */
    public $requestFactory;

    public function __construct(RequestFactory $requestFactory){
        $this->requestFactory = $requestFactory;
    }

    public function execute()
    {
        $requestModel = $this->requestFactory->create();
        get_class($requestModel->getCollection());
        die('Hallos');
    }
}

