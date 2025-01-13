<?php
declare(strict_types=1);

namespace ItemManager\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use ItemManager\Controller\ItemsController;

/**
 * ItemManager\Controller\ItemsController Test Case
 *
 * @uses \ItemManager\Controller\ItemsController
 */
class ItemsControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->Items = TableRegistry::getTableLocator()->get('Items');
    }

    /**
     * Test index method
     *
     * @return void
     * @uses \ItemManager\Controller\ItemsController::index()
     */
    public function testIndex(): void
    {
        $this->get('/item-manager/items/');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \ItemManager\Controller\ItemsController::view()
     */
    public function testView(): void
    {
        $this->get('/item-manager/items/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \ItemManager\Controller\ItemsController::add()
     */
    public function testAdd(): void
    {
        $count = count($this->Items->find()->toArray());
        $this->get('/item-manager/items/add');
        $this->assertResponseOk();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/item-manager/items/add', [
            'item_title' => 'Testing Item',
            'sale_price' => 25.6,
            'is_in_stock' => 1,
            'item_description' => 'Testing item description',
            'category_id' => 1,
        ]);
        $this->assertResponseSuccess();
        $this->assertEquals($count + 1, count($this->Items->find()->toArray()));
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \ItemManager\Controller\ItemsController::edit()
     */
    public function testEdit(): void
    {
        $this->get('/item-manager/items/edit/1');
        $this->assertResponseOk();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/item-manager/items/edit/1', [
            'item_title' => 'Testing Item Edited',
        ]);
        $this->assertResponseSuccess();

        /** @var \ItemManager\Model\Entity\Item $item */
        $item = $this->Items->get(1);
        $this->assertEquals('Testing Item Edited', $item->item_title);
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \ItemManager\Controller\ItemsController::delete()
     */
    public function testDelete(): void
    {
        $count = count($this->Items->find()->toArray());
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/item-manager/items/delete/1');
        $this->assertResponseSuccess();
        $this->assertEquals($count - 1, count($this->Items->find()->toArray()));
    }
}
