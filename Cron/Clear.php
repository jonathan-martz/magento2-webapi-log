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
        $requestFactory = $this->requestFactory->create();
        $dayStart = strtotime("today", time());

        $collection = $requestFactory->getCollection();
        $collection->addFieldToFilter('time', array('lt' => $dayStart));

        if(count($collection) > 0){
            foreach($collection as $key => $item){
                $item->delete();
            }
        }
    }
}

