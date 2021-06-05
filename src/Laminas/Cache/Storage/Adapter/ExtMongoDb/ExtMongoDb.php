<?php


namespace Bridge\Laminas\Cache\Storage\Adapter\ExtMongoDb;


use http\Exception\InvalidArgumentException;

class ExtMongoDb extends \Laminas\Cache\Storage\Adapter\ExtMongoDb
{
    public function setOptions($options)
    {
        if (!$options instanceof ExtMongoDbOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new ExtMongoDb($options);
        }
        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof ExtMongoDb) {
            $this -> setOptions(new ExtMongoDbOptions());
        }
        return parent ::getOptions();
    }
}