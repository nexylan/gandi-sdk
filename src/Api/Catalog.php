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
final class Catalog extends AbstractApi
{
    /**
     * Return the wanted catalog entries.
     *
     * @param array  $options
     * @param string $currency
     * @param string $grid
     *
     * @return array
     */
    public function catalogList(array $options, string $currency = 'EUR', string $grid = 'A'): array
    {
        return $this->gandi->getClient()->catalog->list($options, $currency, $grid);
    }
}
