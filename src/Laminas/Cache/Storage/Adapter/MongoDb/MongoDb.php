<?php

declare(strict_types=1);

namespace Bridge\Laminas\Cache\Storage\Adapter\MongoDb;


use http\Exception\InvalidArgumentException;

class MongoDb extends \Laminas\Cache\Storage\Adapter\MongoDb
{
    public function setOptions($options)
    {
        if (!$options instanceof MongoDbOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new MongoDbOptions($options);
        }
        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof MongoDbOptions) {
            $this -> setOptions(new MongoDbOptions());
        }
        return parent ::getOptions();
    }
}