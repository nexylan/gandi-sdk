<?php

/*
 * This file is part of the Nexylan packages.
 *
 * (c) Nexylan SAS <contact@nexylan.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nexy\SlackBundle\Tests\DependencyInjection;

use Nexy\Gandi\Bridge\Symfony\DependencyInjection\NexyGandiExtension;
use Nexy\Gandi\Gandi;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

final class NexyGandiExtensionTest extends TestCase
{
    public function testSdkServiceInitialization()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->register(Gandi::class, Gandi::class);

        $extension = new NexyGandiExtension();
        $extension->load(
            [['api_key' => 'ThisIsNotTokenChangeIt']],
            $containerBuilder);

        $expectedDefinition = new Definition(
            Gandi::class,
            [
                'ThisIsNotTokenChangeIt',
                null,
                new Reference('nexy_gandi.default_xml_client_rpc'),
            ]
        );
        $expectedDefinition->setPublic(false);

        $this->assertEquals(
            $expectedDefinition,
            $containerBuilder->getDefinition(Gandi::class)
        );
    }
}
