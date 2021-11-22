<?php

namespace Bridge\Laminas\Db\Sql\Ddl\Column;

class SmallInteger extends \Laminas\Db\Sql\Ddl\Column\Column
{
    protected $type = 'SMALLINT';

    /**
     * @return array
     */
    public function getExpressionData()
    {
        $data    = parent::getExpressionData();
        $options = $this->getOptions();

        if (isset($options['length'])) {
            $data[0][1][1] .= '(' . $options['length'] . ')';
        }

        return $data;
    }
}