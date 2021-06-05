<?php

declare(strict_types=1);

namespace Bridge\Laminas\Config;


class Config extends \Laminas\Config\Config
{
    /**
     * @param string|null $node
     * @param string $sep
     * @param null $default
     * @return mixed
     */
    public function descend(string $node = null, $default = null, string $sep = '.'): mixed
    {
        if (is_null($node)) {
            return $this;
        }
        $ret = $this;
        $parts = explode($sep, $node);
        foreach ($parts as $part) {
            if ($ret instanceof self) {
                $ret = $ret -> get($part, $default);
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }
}