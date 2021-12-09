<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\SyliusBonusPointsPlugin\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class CheckInstalledPluginPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (
            !$container->hasDefinition('bitbag_sylius_crossselling_plugin.finder.related_products.abstract')
        ) {
            return;
        }
        $container->getExtension('BitBagPluginCommonsCatalogExtension');
        if (
            !$container->hasDefinition('bitbag_sylius_catalog_plugin.catalog_rule_checker.product_code')
        ) {
            return;
        }
        $container->getExtension('BitBagPluginCommonsCrossSellingExtension');
        if (
            !$container->hasDefinition('bitbag_sylius_elasticsearch_plugin.finder.named_products')
        ) {
            return;
        }
        $container->getExtension('BitBagPluginCommonsElasticsearchExtension');

    }
}
