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

namespace Nexy\Gandi\Api;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class Domain extends AbstractApi
{
    /**
     * @param array      $domain
     * @param array|null $options
     *
     * @return array
     */
    public function isAvailable(array $domain, array $options = null): array
    {
        return $this->gandi->domain()->available($domain, $options);
    }

    /**
     * @param string $domain
     *
     * @return array
     */
    public function info(string $domain): array
    {
        return $this->gandi->domain()->info($domain);
    }

    /**
     * @param array $options
     *
     * @return array
     */
    public function getList(array $options): array
    {
        return $this->gandi->domain()->list($options);
    }

    /**
     * @param array      $domain
     * @param array|null $options
     *
     * @return array
     */
    public function renew(array $domain, array $options = null): array
    {
        return $this->gandi->domain()->renew($domain, $options);
    }
}
