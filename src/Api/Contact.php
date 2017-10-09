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
final class Contact extends AbstractApi
{
    /**
     * @param array|null $options
     *
     * @return object
     */
    public function create(array $options = null)
    {
        return $this->gandi->setup()->contact->create($options);
    }

    /**
     * @param string $handle
     *
     * @return bool|\Exception
     */
    public function delete(string $handle): void
    {
        $response = $this->gandi->setup()->contact->delete($handle);

        if (false === $response) {
            return new \Exception('Cannot delete this contact');
        } else {
            return $response;
        }
    }

    /**
     * @param string $handle
     *
     * @return void
     */
    public function info(string $handle): void
    {
        return $this->gandi->setup()->contact->info($handle);
    }
}
