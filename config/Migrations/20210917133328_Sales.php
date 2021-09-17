<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Sales extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('sales');
        $table
            ->addColumn('seller_id', 'integer', [
                'null' => false,
            ])
            ->addForeignKey('seller_id', 'sellers', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE',
            ]);
        $table->addColumn('value', 'decimal', [
            'default' => null,
            'null' => false
        ]);
        $table->addColumn('comission', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created_at', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
