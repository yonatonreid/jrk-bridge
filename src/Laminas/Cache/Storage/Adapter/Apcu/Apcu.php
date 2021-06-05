<?php


namespace Bridge\Laminas\Cache\Storage\Adapter\Apcu;


use http\Exception\InvalidArgumentException;

class Apcu extends \Laminas\Cache\Storage\Adapter\Apcu
{
    public function setOptions($options)
    {
        if (!$options instanceof ApcuOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new ApcuOptions($options);
        }
        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof ApcuOptions) {
            $this -> setOptions(new ApcuOptions());
        }
        return parent ::getOptions();
    }
}