<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InsertIntoProduct extends AbstractMigration
{
    public function up()
    {
        // read file
        $file = __DIR__ . '/product.json';
        $jsonStr = file_get_contents($file);

        $data = json_decode($jsonStr, true);

        $rows = $data;

        $builder = $this->getQueryBuilder();

        $builder->insert(
            [
                'prod_id',
                'name',
                'price',
            ]
        )->into('tbl_product');

        foreach ($rows as $r) {
            $builder->values($r);
        }

        $builder->execute();
    }

    public function down()
    {
        $builder = $this->getQueryBuilder();

        $builder->delete('tbl_product')
            ->execute();
    }
}
