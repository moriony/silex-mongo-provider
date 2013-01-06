silex-mongo-provider
====================

[![Build Status](https://travis-ci.org/moriony/silex-mongo-provider.png?branch=master)](https://travis-ci.org/moriony/silex-mongo-provider)

[Mongo](mongodb.org/) service provider for the [Silex](silex.sensiolabs.org/) framwork.

Examples
===
```php
// Service declaration
$this->app->register(new MongoServiceProvider, array(
    'mongo.connections' => array(
        'default' => array(
            'server' => "mongodb://localhost:27017",
            'options' => array("connect" => true)
        )
    ),
));

 // Retrive connection provider
$connections = $app['mongo'];

// Retrive connection
$defaultConnection = $connections['default']; 

// Create connection via factory
$mongoFactory = $app['mongo.factory'];
$customConnection = $mongoFactory("mongodb://localhost:27017", array("connect" => true));
```
