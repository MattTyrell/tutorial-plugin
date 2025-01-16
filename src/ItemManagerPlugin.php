<?php
declare(strict_types=1);

namespace ItemManager;

use Cake\Console\CommandCollection;
use Cake\Core\BasePlugin;
use Cake\Core\ContainerInterface;
use Cake\Core\PluginApplicationInterface;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\RouteBuilder;

/**
 * Plugin for ItemManager
 */
class ItemManagerPlugin extends BasePlugin
{
    /**
     * Load all the plugin configuration and bootstrap logic.
     *
     * The host application is provided as an argument. This allows you to load
     * additional plugin dependencies, or attach events.
     *
     * @param \Cake\Core\PluginApplicationInterface $app The host application
     * @return void
     */
    public function bootstrap(PluginApplicationInterface $app): void
    {
    }

    /**
     * Add routes for the plugin.
     *
     * If your plugin has many routes and you would like to isolate them into a separate file,
     * you can create `$plugin/config/routes.php` and delete this method.
     *
     * @param \Cake\Routing\RouteBuilder $routes The route builder to update.
     * @return void
     */
    public function routes(RouteBuilder $routes): void
    {
        $routes->plugin(
            'ItemManager',
            ['path' => '/item-manager'],
            function (RouteBuilder $builder) {
                $builder->connect('/items', ['controller' => 'Items', 'action' => 'index']);
                $builder->connect('/items/{id}', ['controller' => 'Items', 'action' => 'view'])
                    ->setPatterns(['id' => '\d+'])
                    ->setPass(['id']);
                $builder->connect('/items/add', ['controller' => 'Items', 'action' => 'add']);
                $builder->connect('/items/edit/{id}', ['controller' => 'Items', 'action' => 'edit'])
                    ->setPatterns(['id' => '\d+'])
                    ->setPass(['id']);
                $builder->connect('/items/delete/{id}', ['controller' => 'Items', 'action' => 'delete'])
                    ->setPatterns(['id' => '\d+'])
                    ->setPass(['id']);

                $builder->connect('/categories', ['controller' => 'Categories', 'action' => 'index']);
                $builder->connect('/categories/{id}', ['controller' => 'Categories', 'action' => 'view'])
                    ->setPatterns(['id' => '\d+'])
                    ->setPass(['id']);
                $builder->connect('/categories/add', ['controller' => 'Categories', 'action' => 'add']);
                $builder->connect('/categories/edit/{id}', ['controller' => 'Categories', 'action' => 'edit'])
                    ->setPatterns(['id' => '\d+'])
                    ->setPass(['id']);
                $builder->connect('/categories/delete/{id}', ['controller' => 'Categories', 'action' => 'delete'])
                    ->setPatterns(['id' => '\d+'])
                    ->setPass(['id']);

                $builder->fallbacks();
            }
        );
        parent::routes($routes);
    }

    /**
     * Add middleware for the plugin.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to update.
     * @return \Cake\Http\MiddlewareQueue
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        // Add your middlewares here

        return $middlewareQueue;
    }

    /**
     * Add commands for the plugin.
     *
     * @param \Cake\Console\CommandCollection $commands The command collection to update.
     * @return \Cake\Console\CommandCollection
     */
    public function console(CommandCollection $commands): CommandCollection
    {
        // Add your commands here

        $commands = parent::console($commands);

        return $commands;
    }

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update.
     * @return void
     * @link https://book.cakephp.org/4/en/development/dependency-injection.html#dependency-injection
     */
    public function services(ContainerInterface $container): void
    {
        // Add your services here
    }
}
