<?php

declare(strict_types=1);

use App\Infrastructure\Persistence\User\InMemoryProductInterface;
use App\Infrastructure\Repositories\Branch\BranchInterface;
use App\Infrastructure\Repositories\Branch\BranchRepositories;
use App\Infrastructure\Repositories\Inventory\InventoryInterface;
use App\Infrastructure\Repositories\Inventory\InventoryRepositories;
use App\Infrastructure\Repositories\Product\ProductInterface;
use App\Infrastructure\Repositories\Product\ProductRepositories;
use App\Infrastructure\Repositories\User\UserInterface;
use App\Infrastructure\Repositories\User\UserRepositories;
use DI\ContainerBuilder;

use function DI\autowire;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        InMemoryProductInterface::class => autowire(InMemoryProductInterface::class),
        UserInterface::class            => autowire(UserRepositories::class),
        ProductInterface::class         => autowire(ProductRepositories::class),
        InventoryInterface::class       => autowire(InventoryRepositories::class),
        BranchInterface::class          => autowire(BranchRepositories::class),
    ]);
};
