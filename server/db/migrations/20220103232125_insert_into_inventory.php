<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InsertIntoInventory extends AbstractMigration
{
    public function up()
    {
        // read file
        $file    = __DIR__ . '/inventory.json';
        $jsonStr = file_get_contents($file);

        $data = json_decode($jsonStr, true);

        $rows = $data;

        $builder = $this->getQueryBuilder();

        $builder->insert(
            [
                'prod_id',
                'branch_id',
                'inventory_qty',
            ]
        )->into('tbl_inventory');

        foreach ($rows as $r) {
            $product = $this->getQueryBuilder()
                ->select('id')
                ->from('tbl_product')
                ->where(['prod_id' => $r['Prod_ID']])
                ->execute();

            $branch = $this->getQueryBuilder()
                ->select('id')
                ->from('tbl_branch')
                ->where(['branch_id' => $r['Branch_ID']])
                ->execute();

            $builder->values(
                [
                    'prod_id'       => $product->fetchColumn(0),
                    'branch_id'     => $branch->fetchColumn(0),
                    'inventory_qty' => $r['Inventory_Qty'],
                ]
            );
        }

        $builder->execute();
    }

    public function down()
    {
        $builder = $this->getQueryBuilder();

        $builder->delete('tbl_inventory')
            ->execute();
    }
}
