<?php

namespace App\Infrastructure\Repositories;

use Illuminate\Database\Capsule\Manager;

abstract class BaseRepositories
{
    /**
     * @var Manager
     */
    protected $db;

    /**
     * BaseRepository constructor.
     * @param Manager $db
     */
    public function __construct(Manager $db)
    {
        $this->db = $db->getConnection();
    }

    /**
     * @param array $value
     * @return array
     */
    protected function toArray(array $value): array
    {
        return array_map(
            function ($value) {
                return (array)$value;
            },
            $value
        );
    }

}