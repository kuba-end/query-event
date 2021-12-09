<?php
/*

This file was created by developers working at BitBag

Do you need more information about us and what we do? Visit our   website!

We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/
declare(strict_types=1);

namespace BitBag\PluginCommonsPlugin\DependencyInjection;

use BitBag\SyliusCrossSellingPlugin\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Extension\Extension;


final class BitBagPluginCommonsElasticsearchExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config/services/pluginCommons'));

        $loader->load('elasticsearch_event_factory.xml');
        $loader->load('elasticsearch_query_dispatcher.xml');
    }

    public function getConfiguration(array $config, ContainerBuilder $container): ConfigurationInterface
    {
        return new Configuration();
    }
}