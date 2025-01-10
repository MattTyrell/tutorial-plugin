<?php
declare(strict_types=1);

namespace ItemManager\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use ItemManager\Controller\CategoriesController;

/**
 * ItemManager\Controller\CategoriesController Test Case
 *
 * @uses \ItemManager\Controller\CategoriesController
 */
class CategoriesControllerTest extends TestCase
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
        $this->Categories = TableRegistry::getTableLocator()->get('Categories');
    }

    /**
     * Test index method
     *
     * @return void
     * @uses \ItemManager\Controller\ItemsController::index()
     */
    public function testIndex(): void
    {
        $this->get('items/');
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
        $this->get('items/view/1');
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
        $count = $this->Categories->find()->all()-count();
        $this->get('items/add');
        $this->assertResponseOk();
        $this->post('items/add', [
            'name' => 'Testing Category',
        ]);
        $this->assertResponseSuccess();
        $this->assertEquals($count + 1, $this->Categories->find()->all()-count());
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \ItemManager\Controller\ItemsController::edit()
     */
    public function testEdit(): void
    {
        $this->get('items/edit/1');
        $this->assertResponseOk();
        $this->post('items/edit/1', [
            'name' => 'Testing Category Edited',
        ]);
        $this->assertResponseSuccess();

        /** @var \ItemManager\Model\Entity\Category $category */
        $category = $this->Categories->get(1);
        $this->assertEquals('Testing Category Edited', $category->name);
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \ItemManager\Controller\ItemsController::delete()
     */
    public function testDelete(): void
    {
        $count = $this->Categories->find()->all()-count();
        $this->post('items/delete/1');
        $this->assertResponseSuccess();
        $this->assertEquals($count - 1, $this->Categories->find()->all()-count());
    }
}
