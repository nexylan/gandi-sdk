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

namespace Nexy\Gandi\Bridge\Symfony\Bundle;

use Nexy\Gandi\Bridge\Symfony\DependencyInjection\NexyGandiExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class NexyGandiBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    protected function getContainerExtensionClass(): string
    {
        return NexyGandiExtension::class;
    }
}
