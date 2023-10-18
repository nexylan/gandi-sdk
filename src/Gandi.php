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
 * @method Api\Catalog catalog
 * @method Api\Contact contact
 * @method Api\Domain domain
 * @method Api\Operation operation
 *
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class Gandi
{
    private const DEFAULT_API_URL = 'https://rpc.gandi.net/xmlrpc/';

    /**
     * @var Proxy
     */
    private $client;

    /**
     * @var AbstractApi
     */
    private $apis;

    /**
     * @param string               $apiKey
     * @param null|string          $apiUrl
     * @param ClientInterface|null $xmlClient
     */
    public function __construct(string $apiKey, ?string $apiUrl = null, ?ClientInterface $xmlClient = null)
    {
        $xmlClient = $xmlClient ?: new FxmlrpcClient();
        $xmlClient->setUri($apiUrl ?: static::DEFAULT_API_URL);
        $xmlClient->prependParams([$apiKey]);

        $this->client = new Proxy($xmlClient);
    }

    /**
     * @return Proxy
     */
    public function getClient(): Proxy
    {
        return $this->client;
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return Proxy|AbstractApi
     */
    public function __call(string $name, array $arguments)
    {
        try {
            return $this->api(ucfirst(str_replace('api', '', $name)));
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
