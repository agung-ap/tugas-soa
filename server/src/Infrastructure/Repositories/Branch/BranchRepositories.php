<?php

namespace App\Infrastructure\Repositories\Branch;

use App\Infrastructure\Repositories\BaseRepositories;

class BranchRepositories extends BaseRepositories implements BranchInterface
{

    public function findAll()
    {
        $query = $this->db
            ->table('tbl_branch')
            ->get()
            ->toArray();

        return $this->toArray($query);
    }
}