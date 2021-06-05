<?php


namespace Bridge\Laminas\Cache\Storage\Adapter\Memcached;


use http\Exception\InvalidArgumentException;

class Memcached extends \Laminas\Cache\Storage\Adapter\Memcached
{
    public function setOptions($options)
    {
        if (!$options instanceof MemcachedOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new MemcachedOptions($options);
        }

        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof MemcachedOptions) {
            $this -> setOptions(new MemcachedOptions());
        }
        return parent ::getOptions();
    }
}