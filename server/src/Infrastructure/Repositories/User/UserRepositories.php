<?php

namespace App\Infrastructure\Repositories\User;

use App\Infrastructure\Repositories\BaseRepositories;

class UserRepositories extends BaseRepositories implements UserInterface
{
    public function findAll()
    {
        $query = $this->db
            ->table('tbl_user')
            ->get()
            ->toArray();

        return $this->toArray($query);
    }
}