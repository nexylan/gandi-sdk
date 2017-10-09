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

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionConfigurationTestCase;
use Nexy\Gandi\Bridge\Symfony\DependencyInjection\Configuration;
use Nexy\Gandi\Bridge\Symfony\DependencyInjection\NexyGandiExtension;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
class ConfigurationTest extends AbstractExtensionConfigurationTestCase
{
    public function testMinimalConfigurationProcess()
    {
        $expectedConfiguration = [
            'api_url' => 'https://rpc.ote.gandi.net/xmlrpc/',
            'api_key' => 'ThisIsNotTokenChangeIt',
        ];

        $sources = [
            __DIR__.'/../Fixtures/config/config.yml',
        ];

        $this->assertProcessedConfigurationEquals($expectedConfiguration, $sources);
    }

    /**
     * {@inheritdoc}
     */
    protected function getContainerExtension()
    {
        return new NexyGandiExtension();
    }

    /**
     * {@inheritdoc}
     */
    protected function getConfiguration()
    {
        return new Configuration();
    }
}
