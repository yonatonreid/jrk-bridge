<?php

declare(strict_types=1);

namespace Bridge\Laminas\Cache\Storage\Adapter\Filesystem;

use http\Exception\InvalidArgumentException;

class Filesystem extends \Laminas\Cache\Storage\Adapter\Filesystem
{
    public function setOptions($options): \Laminas\Cache\Storage\Adapter\Filesystem
    {
        if (!$options instanceof FilesystemOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new FilesystemOptions($options);
        }

        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof FilesystemOptions) {
            $this -> setOptions(new FilesystemOptions());
        }
        return parent ::getOptions();
    }
}