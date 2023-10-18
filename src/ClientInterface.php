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

use fXmlRpc\ClientInterface as FxmlrpcClientInterface;

/**
 * This is an intermediate interface to bring the fXmlRpc client method under contract.
 */
interface ClientInterface extends FxmlrpcClientInterface
{
    /**
     * @param string $uri
     */
    public function setUri($uri);

    /**
     * @return string
     */
    public function getUri();

    /**
     * @param array $params
     */
    public function prependParams(array $params);

    /**
     * @return array
     */
    public function getPrependParams();

    public function appendParams(array $params);

    /**
     * @return array
     */
    public function getAppendParams();
}
