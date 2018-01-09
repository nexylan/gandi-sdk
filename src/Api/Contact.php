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

use fXmlRpc\Proxy;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 *
 * @see http://doc.rpc.gandi.net/contact/reference.html
 */
final class Contact extends AbstractApi
{
    /**
     * @return array
     */
    public function balance(): array
    {
        return $this->getContactClient()->balance();
    }

    /**
     * @param array $contact
     * @param array $params
     *
     * @return bool
     */
    public function canAssociate(array $contact, array $params): bool
    {
        return (bool) $this->getContactClient()->can_associate($contact, $params);
    }

    /**
     * @param string $handle
     * @param array  $params
     *
     * @return bool
     */
    public function canAssociateDomain(string $handle, array $params): bool
    {
        return (bool) $this->getContactClient()->can_associate_domain($handle, $params);
    }

    /**
     * @param array|null $options
     *
     * @return int
     */
    public function count(array $options = null): int
    {
        return $this->getContactClient()->count($options);
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function create(array $params): array
    {
        return $this->getContactClient()->create($params);
    }

    /**
     * @param string $handle
     *
     * @return bool
     */
    public function delete(string $handle): bool
    {
        return (bool) $this->getContactClient()->delete($handle);
    }

    /**
     * @param string|null $handle
     *
     * @return array
     */
    public function info(string $handle = null): array
    {
        return $this->getContactClient()->info($handle);
    }

    /**
     * @param array|null $options
     *
     * @return array
     */
    public function getList(array $options = null): array
    {
        return $this->getContactClient()->list($options);
    }

    /**
     * @param string $handle
     *
     * @return bool
     */
    public function release(string $handle): bool
    {
        return (bool) $this->getContactClient()->release($handle);
    }

    /**
     * @param string $handle
     * @param array  $params
     *
     * @return bool
     */
    public function update(string $handle, array $params): bool
    {
        return (bool) $this->getContactClient()->update($handle, $params);
    }

    /**
     * @param array $params
     *
     * @return bool
     */
    public function reachabilityResend(array $params): bool
    {
        return (bool) $this->getContactClient()->reachability->resend($params);
    }

    /**
     * @param array|null $options
     *
     * @return int
     */
    public function autofoaCount(array $options = null): int
    {
        return $this->getContactClient()->autofoa->count($options);
    }

    /**
     * @param array|null $params
     *
     * @return array
     */
    public function autofoaCreate(array $params = null): array
    {
        return $this->getContactClient()->autofoa->create($params);
    }

    /**
     * @param int|null $autofoaId
     *
     * @return array
     */
    public function autofoaDelete(int $autofoaId = null): array
    {
        return $this->getContactClient()->autofoa->delete($autofoaId);
    }

    /**
     * @param string|null $handle
     *
     * @return array
     */
    public function autofoaInfo(string $handle = null): array
    {
        return $this->getContactClient()->autofoa->info($handle);
    }

    /**
     * @param int $autofoaId
     * @param int $code
     *
     * @return bool
     */
    public function autofoaValidate(int $autofoaId, int $code): bool
    {
        return (bool) $this->getContactClient()->autofoa->validate($autofoaId, $code);
    }

    /**
     * @return Proxy
     */
    private function getContactClient(): Proxy
    {
        return $this->getGandi()->getClient()->contact;
    }
}
