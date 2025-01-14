<?php
declare(strict_types=1);

namespace ItemManager\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsFixture
 */
class ItemsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'item_title' => 'Testing Item 1',
                'sale_price' => 1.5,
                'is_in_stock' => 1,
                'item_description' => 'Testing Item Description',
                'category_id' => 1,
                'deleted' => null,
                'created' => '2025-01-10 03:03:36',
                'modified' => '2025-01-10 03:03:36',
            ],
        ];
        parent::init();
    }
}
