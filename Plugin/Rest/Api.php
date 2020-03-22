<?php

namespace JonathanMartz\WebApiLog\Plugin\Rest;

use JonathanMartz\WebApiLog\Model\RequestFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Framework\UrlInterface;
use Magento\Webapi\Controller\Rest;
use Psr\Log\LoggerInterface;
use function json_encode;

/**
 * Class Api
 * @package JonathanMartz\WebApiLog\Plugin\Rest
 */
class Api
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var RequestFactory
     */
    protected $webapilog;

    /**
     * @var UrlInterface
     */
    private $url;
    /**
     * @var RemoteAddress
     */
    private $remote;
    /**
     * @var Session
     */
    private $customerSession;

    /**
     * Api constructor.
     * @param LoggerInterface $logger
     * @param UrlInterface $url
     * @param RemoteAddress $remote
     * @param Session $customerSession
     * @param RequestFactory $webapilog
     */
    public function __construct(
        LoggerInterface $logger,
        UrlInterface $url,
        RemoteAddress $remote,
        Session $customerSession,
        RequestFactory $webapilog
    ) {
        $this->logger = $logger;
        $this->url = $url;
        $this->remote = $remote;
        $this->customerSession = $customerSession;
        $this->webapistats = $webapilog;
    }

    /**
     * @param Rest $subject
     * @param callable $proceed
     * @param RequestInterface $request
     * @return mixed
     */
    public function aroundDispatch(
        Rest $subject,
        callable $proceed,
        RequestInterface $request
    ) {
        $url = str_replace([$this->url->getBaseUrl(), 'rest/V1/'], ['', ''], $this->url->getCurrentUrl());
        $loggedIn = $this->customerSession->isLoggedIn();
        $id = $this->customerSession->getSessionId();
        $ip = $this->remote->getRemoteAddress();

        $model = $this->webapistats->create();
        $data = [
            'url' => str_replace('index.php/', '', $url),
            'loggedin' => (int)$loggedIn,
            'session' => $id,
            'ip' => sha1($ip),
            'time' => time()
        ];
        $model->addData($data);
        $saveData = $model->save();
        if(!$saveData) {
            $this->logger->alert('Cant add Request: ' . json_encode($data));
        }

        return $proceed($request);
    }
}
