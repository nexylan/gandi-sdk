<?php

declare(strict_types=1);

/*
 * This file is part of the Nexylan packages.
 *
 * (c) Nexylan SAS <contact@nexylan.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nexy\Gandi;

use fXmlRpc\Client as FxmlrpcClient;
use fXmlRpc\Proxy;
use Nexy\Gandi\Api\AbstractApi;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class Gandi
{
    /**
     * @var string
     */
    private $apiUrl = 'https://rpc.gandi.net/xmlrpc/';

    /**
     * @var Proxy
     */
    private $client;

    /**
     * @param FxmlrpcClient $xmlClient
     * @param string        $apiUrl
     * @param string        $apiKey
     */
    public function __construct(string $apiKey, ?string $apiUrl = null, FxmlrpcClient $xmlClient = null)
    {
        $xmlClient = $xmlClient ?: new FxmlrpcClient();
        $xmlClient->setUri($this->apiUrl);
        $xmlClient->prependParams([$apiKey]);

        $this->client = new Proxy($xmlClient);
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return Proxy|AbstractApi
     */
    public function __call(string $name, array $arguments)
    {
        try {
            if (key_exists(0, $arguments) && $arguments[0] === 'api'){
                return $this->api(ucfirst(str_replace('api', '', $name)));
            } else {
                return $this->client->{$name};
            }

        } catch (\InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method %s', $name));
        }
    }

    /**
     * @param string $apiClass
     *
     * @return AbstractApi
     */
    private function api(string $apiClass): AbstractApi
    {
        if (!isset($this->apis[$apiClass])) {
            $apiFQNClass = '\\Nexy\\Gandi\\Api\\'.$apiClass;
            if (false === class_exists($apiFQNClass)) {
                throw new \InvalidArgumentException(sprintf('Undefined api class %s', $apiClass));
            }
            $this->apis[$apiClass] = new $apiFQNClass($this);
        }

        return $this->apis[$apiClass];
    }
}
