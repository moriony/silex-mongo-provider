<?php
namespace Mongo\Silex\Provider;

class MongoConnectionProvider extends \Pimple
{
    /**
     * @param array $options
     */
    public function __construct(array $options)
    {
        foreach($options as $key => $connection) {
            $this[$key] = $this->share(function() use($connection) {
                return new \MongoClient($connection['server'], $connection['options']);
            });
        }
    }
}
