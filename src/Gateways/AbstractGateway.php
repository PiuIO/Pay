<?php
/**
 * @author: sunguide
 * @email: sunguide@qq.com
 * @time: 2018-01
 */

namespace PiuIO\Pay\Gateways;

use PiuIO\Pay\Contracts\GatewayInterface;
use PiuIO\Pay\Utils\Config;

abstract class AbstractGateway implements GatewayInterface
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * AbstractGateway constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * 格式化消息.
     *
     * @param $receives
     *
     * @return array
     */
    abstract public function convertNotificationToArray($receives): array;
}
