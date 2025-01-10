<?php
declare(strict_types=1);

namespace ItemManager\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use ItemManager\Model\Table\ItemsTable;

/**
 * ItemManager\Model\Table\ItemsTable Test Case
 */
class ItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ItemManager\Model\Table\ItemsTable
     */
    protected $Items;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.ItemManager.Items',
        'plugin.ItemManager.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Items') ? [] : ['className' => ItemsTable::class];
        $this->Items = $this->getTableLocator()->get('Items', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Items);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \ItemManager\Model\Table\ItemsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \ItemManager\Model\Table\ItemsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
