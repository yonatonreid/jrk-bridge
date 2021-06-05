<?php


namespace Bridge\Laminas\Cache\Storage\Adapter\Apc;


use http\Exception\InvalidArgumentException;

class Apc extends \Laminas\Cache\Storage\Adapter\Apc
{
    public function setOptions($options)
    {
        if (!$options instanceof ApcOptions) {
            if (!is_array($options)) {
                throw new InvalidArgumentException(sprintf(
                    '%s requires an array format for initialization',
                    get_class($this)
                ));
            }
            $options = new ApcOptions($options);
        }
        return parent ::setOptions($options);
    }

    public function getOptions()
    {
        if (!$this -> options instanceof ApcOptions) {
            $this -> setOptions(new ApcOptions());
        }
        return parent ::getOptions();
    }
}