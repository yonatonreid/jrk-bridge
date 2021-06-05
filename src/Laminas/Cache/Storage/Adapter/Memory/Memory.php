<?php

declare(strict_types=1);

namespace Bridge\Laminas\Cache\Storage\Adapter\Memory;

use http\Exception\InvalidArgumentException;

class Memory extends \Laminas\Cache\Storage\Adapter\Memory
{

    public function setOptions($options)
    {
        if (!$options instanceof MemoryOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new MemoryOptions($options);
        }

        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof MemoryOptions) {
            $this -> setOptions(new MemoryOptions());
        }
        return parent ::getOptions();
    }
}