<?php

namespace Mongo\Silex\Tests;

use Silex\Application;
use Mongo\Silex\Provider\MongoServiceProvider;

class MongoServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    protected $app;

    public function setUp()
    {
        $this->app = new Application();
        $this->app->register(new MongoServiceProvider, array(
            'mongo.connections' => array(
                'default' => array(
                    'server' => "mongodb://localhost:27017",
                    'options' => array("connect" => false)
                )
            ),
        ));
    }

    public function testServiceDeclaration()
    {
        $this->assertInstanceOf('Mongo\Silex\Provider\MongoConnectionsProvider', $this->app['mongo']);
    }

    public function testConnectionProvider()
    {
        $this->assertInstanceOf('Mongo', $this->app['mongo']['default']);
    }

    public function testFactory()
    {
        $factory = $this->app['mongo.factory'];
        $connection = $factory("mongodb://localhost:27017", array("connect" => false));
        $this->assertInstanceOf('Mongo', $connection);
    }
}
