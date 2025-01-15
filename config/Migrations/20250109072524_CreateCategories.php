<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCategories extends AbstractMigration
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
        $table = $this->table('categories')
            ->addColumn('id', $isSqlite ? 'integer' : 'biginteger', [
                'autoIncrement' => true,
                'comment' => 'Category ID',
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'comment' => 'Category Name',
                'default' => null,
                'limit' => 255,
                'null' => false,
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
            ]);

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
    public function down(): void
    {
        $this->table('categories')->drop()->save();
    }
}
