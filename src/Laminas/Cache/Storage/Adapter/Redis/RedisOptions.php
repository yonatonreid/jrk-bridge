<?php


declare(strict_types=1);

namespace Bridge\Laminas\Cache\Storage\Adapter\Redis;


class RedisOptions extends \Laminas\Cache\Storage\Adapter\RedisOptions
{
    public function getResourceManager()
    {
        if (!$this -> resourceManager) {
            $this -> resourceManager = new RedisResourceManager();
        }
        return $this -> resourceManager;
    }
}