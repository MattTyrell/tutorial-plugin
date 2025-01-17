# ItemManager Plugin

## Table of Contents
1. [Introduction](#introduction)
2. [Installation](#installation)
3. [Running the plugin's PHPUnit tests](#running-the-plugins-phpunit-tests)
4. [Updates](#updates)
5. [Usage](#usage)

## Introduction

The ItemManager plugin offers basic CRUD operations and includes the following:
1. Migration files for creating the database tables 'items' and 'categories'.
2. Models for 'Item' and 'Category'.
3. Controllers for 'Items' and 'Categories'.
4. Template view files for 'Items' and 'Categories' for each of the CRUD operations (index, view, add, edit, delete).

**This plugin supports CakePHP version 4.5.x only.**

## Installation

Note: This is to be done in your CakePHP application.

In `app/composer.json`, add the following to the `repositories` section:
```json
"repositories": {
    "itemmanager": {
        "type": "vcs",
        "url": "https://github.com/MattTyrell/tutorial-plugin.git",
        "branch": "main"
    }
}
```

Install the plugin via composer.
```bash
composer require matthewtan/item-manager
```

Load the plugin into the application.
```bash
bin/cake plugin load ItemManager
````

Run the migration to create the database tables.
```bash
bin/cake migrations migrate --plugin ItemManager
```

You can now either use your machine's webserver to view the webpage to verify its installation. Replace `<HOST>` with your host.

http://<HOST>/item-manager/items

## Running the plugin's PHPUnit tests

Before running the unit tests for the plugins in the tutorials CakePHP application, some additional configurations are needed.

Add the following in `phpunit.xml.dist` (within the `<testsuites>` tags so that PHPUnit will run the test cases in the ItemManager vendor directory:
```xml
<!-- Add plugin test suites here -->
<testsuite name="ItemManager">
    <directory>vendor/matthewtan/item-manager/tests/TestCase/</directory>
</testsuite>
<!-- More code below -->
```

Go to `app/tests/bootstrap.php` and add the following at the bottom of the file, replacing `(new Migrator())->run();`:
```php
(new Migrator())->runMany([
    ['connection' => 'test'],
    ['plugin' => 'ItemManager'],
]);
```

Add the following in the composer.json's autoload-dev object
```json
"autoload-dev": {
    "psr-4": {
        "ItemManager\\Test\\": "vendor/matthewtan/item-manager/tests/",
        "ItemManager\\Test\\Fixture\\": "vendor/matthewtan/item-manager/tests/Fixture/"
    }
}
```

Dumpautoload via composer to refresh:
```bash
composer dumpautoload
```

Now you can run the plugin unit tests in the CakePHP application:
```bash
composer test
```

## Updates

If you want to update the ItemManager plugin, simply run the following:

```bash
composer update matthewtan/item-manager
```

## Usage
Once everything has been setup and installed, ensure that you can visit the following URL:

`http://<HOST>/item-manager/<CONTROLLER>/<ACTION>/<ID>`

Replace `<HOST>` with your web server host.

The following is a list of the controllers, actions, and whether an ID is needed to view the page:

Replace `<CONTROLLER>`, `<ACTION>`, and `<ID>` in the URL with the following values:

| Controller | Action | Needs ID? |
|------------|--------|-----------|
| Items      | index  | No        |
| Items      | view   | Yes       |
| Items      | add    | No        |
| Items      | edit   | Yes       |
| Items      | delete | Yes       |
| Categories | index  | No        |
| Categories | view   | Yes       |
| Categories | add    | No        |
| Categories | edit   | Yes       |
| Categories | delete | Yes       |
