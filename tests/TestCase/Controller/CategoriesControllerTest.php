<?php
declare(strict_types=1);

namespace ItemManager\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

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
     * @uses \ItemManager\Controller\CategoriesController::index()
     */
    public function testIndex(): void
    {
        $this->get('/item-manager/categories/');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \ItemManager\Controller\CategoriesController::view()
     */
    public function testView(): void
    {
        $this->get('/item-manager/categories/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \ItemManager\Controller\CategoriesController::add()
     */
    public function testAdd(): void
    {
        $count = count($this->Categories->find()->all()->toArray());
        $this->get('/item-manager/categories/add');
        $this->assertResponseOk();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/item-manager/categories/add', [
            'name' => 'Testing Category',
        ]);
        $this->assertResponseSuccess();
        $this->assertEquals($count + 1, count($this->Categories->find()->toArray()));
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \ItemManager\Controller\CategoriesController::edit()
     */
    public function testEdit(): void
    {
        $this->get('/item-manager/categories/edit/1');
        $this->assertResponseOk();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/item-manager/categories/edit/1', [
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
     * @uses \ItemManager\Controller\CategoriesController::delete()
     */
    public function testDelete(): void
    {
        $count = count(
            $this->Categories
                ->find()
                ->where(['deleted IS' => null])
                ->toArray()
        );
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/item-manager/categories/delete/1');
        $this->assertResponseSuccess();
        $afterDeleteCount = count(
            $this->Categories
                ->find()
                ->where(['deleted IS' => null])
                ->toArray()
        );
        $this->assertEquals($count - 1, $afterDeleteCount);
    }
}
