<?php

namespace JonathanMartz\WebApiLog\Cron;

use JonathanMartz\WebApiLog\Model\RequestFactory;

class Clear
{

    /**
     * @var RequestFactory
     */
    protected $webapilog;

    public function __constructor(RequestFactory $collection){
        $this->webapistats = $webapilog;
    }

    public function execute()
    {
        die('Hallo');
    }
}

