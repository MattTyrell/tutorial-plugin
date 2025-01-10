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
                'item_title' => 'Lorem ipsum dolor sit amet',
                'sale_price' => 1.5,
                'is_in_stock' => 1,
                'item_description' => 'Lorem ipsum dolor sit amet',
                'category_id' => 1,
                'deleted' => '2025-01-10 03:03:36',
                'created' => '2025-01-10 03:03:36',
                'modified' => '2025-01-10 03:03:36',
            ],
        ];
        parent::init();
    }
}
