<?php

declare(strict_types=1);

namespace Bridge\Laminas\Cache\Storage\Adapter\Session;


use http\Exception\InvalidArgumentException;

class Session extends \Laminas\Cache\Storage\Adapter\Session
{
    public function setOptions($options)
    {
        if (!$options instanceof SessionOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new SessionOptions($options);
        }

        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof SessionOptions) {
            $this -> setOptions(new SessionOptions());
        }
        return $this -> options;
    }
}