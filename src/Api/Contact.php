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
    public function balance(): array
    {
        return $this->getContactClient()->balance();
    }

    public function canAssociate(array $contact, array $params): bool
    {
        return (bool) $this->getContactClient()->can_associate($contact, $params);
    }

    public function canAssociateDomain(string $handle, array $params): bool
    {
        return (bool) $this->getContactClient()->can_associate_domain($handle, $params);
    }

    public function count(array $options = null): int
    {
        return $this->getContactClient()->count($options);
    }

    public function create(array $params): array
    {
        return $this->getContactClient()->create($params);
    }

    public function delete(string $handle): bool
    {
        return (bool) $this->getContactClient()->delete($handle);
    }

    public function info(string $handle = null): array
    {
        return $this->getContactClient()->info($handle);
    }

    public function getList(array $options = null): array
    {
        return $this->getContactClient()->list($options);
    }

    public function release(string $handle): bool
    {
        return (bool) $this->getContactClient()->release($handle);
    }

    public function update(string $handle, array $params): bool
    {
        return (bool) $this->getContactClient()->update($handle, $params);
    }

    public function reachabilityResend(array $params): bool
    {
        return (bool) $this->getContactClient()->reachability->resend($params);
    }

    public function autofoaCount(array $options = null): int
    {
        return $this->getContactClient()->autofoa->count($options);
    }

    public function autofoaCreate(array $params = null): array
    {
        return $this->getContactClient()->autofoa->create($params);
    }

    public function autofoaDelete(int $autofoaId = null): array
    {
        return $this->getContactClient()->autofoa->delete($autofoaId);
    }

    public function autofoaInfo(string $handle = null): array
    {
        return $this->getContactClient()->autofoa->info($handle);
    }

    public function autofoaValidate(int $autofoaId, int $code): bool
    {
        return (bool) $this->getContactClient()->autofoa->validate($autofoaId, $code);
    }

    private function getContactClient(): Proxy
    {
        return $this->getGandi()->getClient()->contact;
    }
}
