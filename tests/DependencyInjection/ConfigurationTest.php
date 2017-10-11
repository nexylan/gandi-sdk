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

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;

    public function testProcessedValues()
    {
        $this->assertProcessedConfigurationEquals([
            ['api_url' => 'https://rpc.ote.gandi.net/xmlrpc/'],
            ['api_key' => 'ThisIsNotTokenChangeIt'],
        ], [
            'api_url' => 'https://rpc.ote.gandi.net/xmlrpc/',
            'api_key' => 'ThisIsNotTokenChangeIt',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getConfiguration()
    {
        return new Configuration();
    }
}
