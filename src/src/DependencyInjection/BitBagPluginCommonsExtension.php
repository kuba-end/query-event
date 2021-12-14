<?php
/*

This file was created by developers working at BitBag

Do you need more information about us and what we do? Visit our   website!

We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/
declare(strict_types=1);

namespace BitBag\PluginCommonsPlugin\DependencyInjection;

use BitBag\PluginCommonsPlugin\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Extension\Extension;


final class BitBagPluginCommonsExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config/'));


        $bundles = $container->getParameter('kernel.bundles');

        if (array_key_exists('BitBagSyliusElasticsearchPlugin', $bundles)) {
            $loader->load('services/pluginCommons/elasticsearch_event_factory.xml');
            $loader->load('services/pluginCommons/elasticsearch_query_dispatcher.xml');
            $loader->load('services/pluginCommons/elasticsearch_subscriber.xml');
        }
        if (array_key_exists('BitBagSyliusCatalogPlugin', $bundles)) {
            $loader->load('services/pluginCommons/catalog_event_factory.xml');
            $loader->load('services/pluginCommons/catalog_query_dispatcher.xml');
            $loader->load('services/pluginCommons/catalog_subscriber.xml');
        }
        if (array_key_exists('BitBagSyliusCrosssellingPlugin', $bundles)) {
            $loader->load('services/pluginCommons/crossselling_event_factory.xml');
            $loader->load('services/pluginCommons/crossselling_query_dispatcher.xml');
            $loader->load('services/pluginCommons/crossselling_dispatcher.xml');
        }
    }

    public function getConfiguration(array $config, ContainerBuilder $container): ConfigurationInterface
    {
        return new Configuration();
    }
}
