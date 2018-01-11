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

namespace Nexy\Gandi\Bridge\Symfony\DependencyInjection;

use fXmlRpc\Client;
use Nexy\Gandi\Gandi;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nexy_gandi');

        $rootNode
            ->children()
                ->scalarNode('api_key')
                    ->isRequired()
                    ->info('Gandi api key')
                ->end()
                ->scalarNode('api_url')
                    ->defaultNull()
                    ->info(sprintf('Gandi remote api endpoint (for default value see: "%s::DEFAULT_API_URL".', Gandi::class))
                ->end()
                ->scalarNode('xml_rpc_client')
                    ->defaultValue('nexy_gandi.default_xml_client_rpc')
                    ->info(
                        sprintf(
                            'XML RPC client service. The service must be an instance of "%s"',
                            Client::class
                        )
                    )
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
