<?php

namespace App\Infrastructure\Repositories\Inventory;

use App\Infrastructure\Repositories\BaseRepositories;

class InventoryRepositories extends BaseRepositories implements InventoryInterface
{

    public function findAll()
    {
        $query = $this->db
            ->table('tbl_inventory')
            ->get()
            ->toArray();

        return $this->toArray($query);
    }
}