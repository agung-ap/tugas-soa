<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InsertIntoBranch extends AbstractMigration
{
    public function up()
    {
        // read file
        $file = __DIR__ . '/branch.json';
        $jsonStr = file_get_contents($file);

        $data = json_decode($jsonStr, true);

        $rows = $data;

        $builder = $this->getQueryBuilder();

        $builder->insert(
            [
                'branch_id',
                'city',
            ]
        )->into('tbl_branch');

        foreach ($rows as $r) {
            $builder->values($r);
        }

        $builder->execute();
    }

    public function down()
    {
        $builder = $this->getQueryBuilder();

        $builder->delete('tbl_branch')
            ->execute();
    }
}
