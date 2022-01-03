<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InventoryTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        // create the table
        $table = $this->table('tbl_inventory');
        $table->addColumn('prod_id', 'integer')
            ->addColumn('branch_id', 'integer')
            ->addColumn('inventory_qty', 'integer', ['limit' => 3])
            ->addForeignKey('prod_id', 'tbl_product', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->addForeignKey('branch_id', 'tbl_branch', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
            ->create();
    }
}
