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
                $mongoClass = (version_compare(phpversion('mongo'), '1.3.0', '<')) ? '\Mongo' : '\MongoClient';
                return new $mongoClass($connection['server'], $connection['options']);
            });
        }
    }
}
