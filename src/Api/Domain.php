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
class Domain extends AbstractApi
{
    /**
     * @param array $domain
     * @param array $options
     *
     * @return array
     */
    public function isAvailable(array $domain, array $options = null): array
    {
        $results = $this->gandi->setup()->domain->available($domain, $options);

        foreach ($results as $domain => $result) {
            if ('pending' === $result) {
                usleep(700000);

                return $this->gandi->setup()->domain->available($domain);
            }
        }

        return $results;
    }

    /**
     * @param string $domain
     *
     * @return array
     */
    public function info($domain): array
    {
        return $this->gandi->setup()->domain->info($domain);
    }

    /**
     * @param array $options
     *
     * @return object
     */
    public function getList(array $options)
    {
        return $this->gandi->setup()->domain->list($options);
    }

    /**
     * @param array $domain
     * @param array $options
     *
     * @return object
     */
    public function renew(array $domain, array $options = null)
    {
        return $this->gandi->setup()->domain->renew($domain, $options);
    }
}
