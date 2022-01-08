<?php

namespace App\Infrastructure\Repositories\Inventory;

use App\Infrastructure\Repositories\BaseRepositories;

class InventoryRepositories extends BaseRepositories implements InventoryInterface
{

    public function findAll()
    {
        $query = $this->db
            ->table('tbl_inventory')
            ->select('tbl_inventory.id',
                'tbl_inventory.inventory_qty',
                'tbl_product.name as product_name',
                'tbl_product.price as product_price',
                'tbl_branch.city as branch_city'
            )
            ->join('tbl_product', 'tbl_inventory.prod_id', '=', 'tbl_product.id')
            ->join('tbl_branch', 'tbl_inventory.branch_id', '=', 'tbl_branch.id')
            ->get()
            ->toArray();

        return $this->toArray($query);
    }
}