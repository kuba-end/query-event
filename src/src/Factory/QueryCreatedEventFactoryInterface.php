<?php

declare(strict_types=1);

namespace BitBag\PluginCommonsPlugin\Factory;

use BitBag\PluginCommonsPlugin\Event\QueryCreatedEventInterface;
use Elastica\Query\AbstractQuery;

interface QueryCreatedEventFactoryInterface
{
    public function createNewEvent(AbstractQuery $boolQuery): QueryCreatedEventInterface;
}
