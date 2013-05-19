<?php
namespace Mongo\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class MongoServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Application $app An Application instance
     */
    public function register(Application $app)
    {
        $app['mongo.connections'] = array(
            'default' => array(
                'server' => "mongodb://localhost:27017",
                'options' => array("connect" => true)
            )
        );

        $app['mongo.factory'] = $app->protect(function ($server = "mongodb://localhost:27017", array $options = array("connect" => true)) use ($app) {
            return new \Mongo($server, $options);
        });

        $app['mongo'] = $app->share(function () use($app) {
            return new MongoConnectionProvider($app['mongo.connections']);
        });
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registers
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {}
}
