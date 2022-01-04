<?php

namespace App\Infrastructure\Repositories\Product;

use App\Infrastructure\Repositories\BaseRepositories;

class ProductRepositories extends BaseRepositories implements ProductInterface
{

    public function findAll()
    {
        $query = $this->db
            ->table('tbl_product')
            ->get()
            ->toArray();

        return $this->toArray($query);
    }
}