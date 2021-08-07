<?php


namespace Bridge\Ramsey\Uuid;


class Uuid extends \Ramsey\Uuid\Uuid
{
    public static function uuid4WithoutSlashes()
    {
        $uuid = parent ::uuid4();
        return str_ireplace('-', '', $uuid);
    }
}