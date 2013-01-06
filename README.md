# silex-mongo-provider <sup>[![Build Status](https://travis-ci.org/moriony/silex-mongo-provider.png?branch=master)](https://travis-ci.org/moriony/silex-mongo-provider)</sup>

[Mongo](http://mongodb.org/) service provider for the [Silex](http://silex.sensiolabs.org/) framwork.

## Install via composer

Add in your ```composer.json``` the require entry for this library.
```json
{
    "require": {
        "moriony/silex-mongo-provider": "*"
    }
}
```
and run ```composer install``` (or ```update```) to download all files.

## Usage

### Service registration
```php
$this->app->register(new MongoServiceProvider, array(
    'mongo.connections' => array(
        'default' => array(
            'server' => "mongodb://localhost:27017",
            'options' => array("connect" => true)
        )
    ),
));
```

###  Connections retrieving
```php
$connections = $app['mongo'];
$defaultConnection = $connections['default']; 
```

###  Creating mongo connection via factory
```php
$mongoFactory = $app['mongo.factory'];
$customConnection = $mongoFactory("mongodb://localhost:27017", array("connect" => true));
```
