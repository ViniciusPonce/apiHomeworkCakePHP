<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Seller extends AbstractMigration
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
        $table = $this->table('sellers');
        $table->addColumn('seller_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('seller_email', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->create();
    }
}
