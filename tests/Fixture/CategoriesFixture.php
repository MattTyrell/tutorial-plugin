<?php
declare(strict_types=1);

namespace ItemManager\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
{
    public $import = ['table' => 'categories'];

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
                'name' => 'Category 1',
                'deleted' => null,
                'created' => '2025-01-10 03:05:32',
                'modified' => '2025-01-10 03:05:32',
            ],
        ];
        parent::init();
    }
}
