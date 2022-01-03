<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InsertIntoUser extends AbstractMigration
{
    public function up()
    {
        // read file
        $file = __DIR__ . '/user.json';
        $jsonStr = file_get_contents($file);

        $data = json_decode($jsonStr, true);

        $rows = $data;

        $builder = $this->getQueryBuilder();

        $builder->insert(
            [
                'user_id',
                'name',
                'role',
            ]
        )->into('tbl_user');

        foreach ($rows as $r) {
            $builder->values($r);
        }

        $builder->execute();
    }

    public function down()
    {
        $builder = $this->getQueryBuilder();

        $builder->delete('tbl_user')
            ->execute();
    }

}
