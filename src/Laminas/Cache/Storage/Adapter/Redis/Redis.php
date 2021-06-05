<?php

declare(strict_types=1);

namespace Bridge\Laminas\Cache\Storage\Adapter\Redis;


use http\Exception\InvalidArgumentException;

class Redis extends \Laminas\Cache\Storage\Adapter\Redis
{
    public function setOptions($options): \Laminas\Cache\Storage\Adapter\Redis
    {
        if (!$options instanceof RedisOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new RedisOptions($options);
        }
        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof RedisOptions) {
            $this -> setOptions(new RedisOptions());
        }
        return parent ::getOptions();
    }
}