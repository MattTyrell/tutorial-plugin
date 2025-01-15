<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateItems extends AbstractMigration
{
    public $autoId = false;
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     *
     * @return void
     */
    public function up(): void
    {
        $connection = $this->getAdapter()->getConnection();
        $isSqlite = $connection->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
        $table = $this->table('items')
            ->addColumn('id', $isSqlite ? 'integer' : 'biginteger', [
                'autoIncrement' => true,
                'comment' => 'Item ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('item_title', 'string', [
                'comment' => 'Item Title',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('sale_price', 'decimal', [
                'comment' => 'Sale Price',
                'default' => null,
                'null' => false,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('is_in_stock', 'boolean', [
                'comment' => 'Is In Stock',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('item_description', 'string', [
                'comment' => 'Item Description',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('category_id', 'biginteger', [
                'comment' => 'Category ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('deleted', 'datetime', [
                'comment' => 'Deleted',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'comment' => 'Created',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'comment' => 'Modified',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'category_id',
                ],
                [
                    'name' => 'category_id',
                    'unique' => false,
                ]
            );

        $table->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     *
     * @return void
     */
    public function down()
    {
        $this->table('items')->drop()->save();
    }
}
