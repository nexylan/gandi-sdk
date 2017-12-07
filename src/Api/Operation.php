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
final class Operation extends AbstractApi
{
    /**
     * @param int $id
     *
     * @return array
     */
    final public function info(int $id): array
    {
        return $this->getGandi()->getClient()->operation->info($id);
    }
}
