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
     * @dataProvider dataProviderValidationDefault
     * @param array $data The data to be validated
     * @param array $expected The expected validation errors
     * @return void
     * @uses \ItemManager\Model\Table\ItemsTable::validationDefault()
     */
    public function testValidationDefault(array $data, array $expected): void
    {
        $validator = $this->Items->getValidator();
        $result = $validator->validate($data);
        $this->assertEquals($expected, $result);
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \ItemManager\Model\Table\ItemsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $item = $this->Items->newEntity([
            'item_title' => 'Item 1',
            'sale_price' => 35.5,
            'is_in_stock' => 1,
            'item_description' => '',
            'category_id' => 1,
        ]);
        $this->assertTrue($this->Items->checkRules($item));

        $item = $this->Items->newEntity([
            'item_title' => 'Item 2',
            'sale_price' => 35.5,
            'is_in_stock' => 1,
            'item_description' => '',
            'category_id' => 0,
        ]);
        $this->assertFalse($this->Items->checkRules($item));
    }

    /**
     * Data provider for validationDefault test
     *
     * @return array
     */
    public function dataProviderValidationDefault(): array
    {
        return [
            [
                'data' => [
                    'item_title' => 'Item 1',
                    'sale_price' => 35.5,
                    'is_in_stock' => 1,
                    'item_description' => '',
                    'category_id' => 1,
                ],
                'expected' => [],
            ],
            [
                'data' => [
                    'item_title' => '',
                    'sale_price' => 'Hello',
                    'is_in_stock' => 67,
                    'item_description' => '',
                    'category_id' => 2,
                ],
                'expected' => [
                    'item_title' => ['_empty' => 'This field cannot be left empty'],
                    'sale_price' => ['decimal' => 'The provided value is invalid'],
                    'is_in_stock' => ['boolean' => 'The provided value is invalid'],
                ],
            ],
        ];
    }
}
