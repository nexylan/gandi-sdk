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

use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use Nexy\Gandi\Bridge\Symfony\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;

    public function testProcessedValues()
    {
        $this->assertProcessedConfigurationEquals(
            [
                ['api_key' => 'ThisIsNotTokenChangeIt'],
                ['api_url' => 'https://rpc.ote.gandi.net/xmlrpc/'],
                ['xml_rpc_client' => 'custom.xml_client_rpc'],
            ],
            [
                'api_key' => 'ThisIsNotTokenChangeIt',
                'api_url' => 'https://rpc.ote.gandi.net/xmlrpc/',
                'xml_rpc_client' => 'custom.xml_client_rpc',
            ]
        );
    }

    public function testConfigurationRequirements()
    {
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('The child node "api_key" at path "nexy_gandi" must be configured.');
        $this->assertProcessedConfigurationEquals(
            [],
            [
                'api_key' => 'ThisIsNotTokenChangeIt',
                'api_url' => 'https://rpc.ote.gandi.net/xmlrpc/',
                'xml_rpc_client' => 'custom.xml_client_rpc',
            ]
        );
    }

    public function testConfigurationDefaults()
    {
        $this->assertProcessedConfigurationEquals(
            [
                ['api_key' => 'ThisIsNotTokenChangeIt'],
            ],
            [
                'api_key' => 'ThisIsNotTokenChangeIt',
                'api_url' => null,
                'xml_rpc_client' => 'nexy_gandi.default_xml_client_rpc',
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getConfiguration()
    {
        return new Configuration();
    }
}
