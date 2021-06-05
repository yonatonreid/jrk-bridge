<?php

declare(strict_types=1);

namespace Bridge\Laminas\Session\SaveHandler;


use Bridge\Laminas\Db\TableGateway\TableGateway;

class DbTableGateway extends \Laminas\Session\SaveHandler\DbTableGateway
{
    public function __construct(TableGateway $tableGateway, DbTableGatewayOptions $options)
    {
        parent ::__construct($tableGateway, $options);
    }
}