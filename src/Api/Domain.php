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
        return $this->getGandi()->getClient()->domain->available($domain, $options);
    }

    /**
     * @param string $domain
     *
     * @return array
     */
    public function info(string $domain): array
    {
        return $this->getGandi()->getClient()->domain->info($domain);
    }

    /**
     * @param array|null $options
     *
     * @return array
     */
    public function getList(array $options = null): array
    {
        return $this->getGandi()->getClient()->domain->list($options);
    }

    /**
     * @param string     $domain
     * @param array|null $options
     *
     * @return array
     */
    final public function create(string $domain, ?array $options = null): array
    {
        return $this->getGandi()->getClient()->domain->create($domain, $options);
    }

    /**
     * @param string     $domain
     * @param array|null $options
     *
     * @return array
     */
    public function renew(string $domain, array $options = null): array
    {
        return $this->getGandi()->getClient()->domain->renew($domain, $options);
    }

    /**
     * @param string $domain
     *
     * @return bool
     */
    final public function isDeletable(string $domain): bool
    {
        return $this->getGandi()->getClient()->domain->delete->available($domain);
    }

    /**
     * @param string $domain
     *
     * @return array
     */
    final public function delete(string $domain): array
    {
        return $this->getGandi()->getClient()->domain->delete->proceed($domain);
    }

    /**
     * @param string     $domain
     * @param array|null $options
     *
     * @return array
     */
    final public function transferIn(string $domain, ?array $options = null): array
    {
        return $this->getGandi()->getClient()->domain->transferin->proceed($domain, $options);
    }

    /**
     * @param string     $domain
     * @param array      $nameservers
     * @param array|null $options
     *
     * @return array
     */
    final public function setNameservers(string $domain, array $nameservers, ?array $options = null): array
    {
        return $this->getGandi()->getClient()->domain->nameservers->set($domain, $nameservers, $options);
    }
}
