<?php

namespace Bridge\Laminas\Db\Sql\Ddl\Column;

use Laminas\Db\Sql\Ddl\Column\AbstractLengthColumn;

class Clob extends AbstractLengthColumn
{
    /**
     * @var string
     */
    protected $type = 'CLOB';
}