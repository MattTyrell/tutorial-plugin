<?php
declare(strict_types=1);

namespace ItemManager\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'deleted' => '2025-01-10 03:05:32',
                'created' => '2025-01-10 03:05:32',
                'modified' => '2025-01-10 03:05:32',
            ],
        ];
        parent::init();
    }
}
