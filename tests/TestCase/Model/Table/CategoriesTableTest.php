<?php
declare(strict_types=1);

namespace ItemManager\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use ItemManager\Model\Table\CategoriesTable;

/**
 * ItemManager\Model\Table\CategoriesTable Test Case
 */
class CategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ItemManager\Model\Table\CategoriesTable
     */
    protected $Categories;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.ItemManager.Categories',
        'plugin.ItemManager.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Categories') ? [] : ['className' => CategoriesTable::class];
        $this->Categories = $this->getTableLocator()->get('Categories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Categories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \ItemManager\Model\Table\CategoriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
