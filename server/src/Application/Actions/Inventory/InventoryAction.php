<?php

namespace App\Application\Actions\Inventory;

use App\Application\Actions\Action;
use App\Infrastructure\Repositories\Inventory\InventoryInterface;
use Psr\Log\LoggerInterface;

abstract class InventoryAction extends Action
{
    /**
     * @var InventoryInterface
     */
    protected $inventory;

    /**
     * @param LoggerInterface $logger
     * @param InventoryInterface $inventory
     */
    public function __construct(
        LoggerInterface $logger,
        InventoryInterface $inventory
    ) {
        parent::__construct($logger);
        $this->inventory = $inventory;
    }

}