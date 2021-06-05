<?php

declare(strict_types=1);

namespace Bridge\Laminas\Db\Adapter;


use Bridge\Laminas\Db\ResultSet\HydratingResultSet;
use Bridge\Laminas\Db\ResultSet\ResultSet;
use Bridge\Laminas\Hydrator\ReflectionHydrator;
use Laminas\Db\Adapter\Driver\ResultInterface;
use function is_null;


class Adapter extends \Laminas\Db\Adapter\Adapter
{
    public function rawExecute(string $sql)
    {
        $this -> query($sql, parent::QUERY_MODE_EXECUTE);
    }

    public function startTimer(string $timer)
    {
        $this -> getProfiler() -> profilerStart($timer);
    }

    public function stopTimer()
    {
        $this -> getProfiler() -> profilerFinish();
    }

    public function preparedCollection(string $sql, array $params = [], object $entity = null): ResultInterface|ResultSet|bool
    {
        $stmt = $this -> createStatement($sql);
        $stmt -> prepare();
        $res = $stmt -> execute($params);
        if ($res instanceof ResultInterface && $res -> isQueryResult()) {
            if (is_null($entity)) {
                $resultSet = new ResultSet();
            } else {
                $resultSet = new HydratingResultSet(new ReflectionHydrator(), $entity);
            }
            $resultSet -> initialize($res);
            return $resultSet;
        }
        return false;
    }

    public function collection(string $sql, object $entity = null): ResultInterface|ResultSet|bool
    {
        $stmt = $this -> query($sql);
        $res = $stmt -> execute();
        if ($res instanceof ResultInterface && $res -> isQueryResult()) {
            if (is_null($entity)) {
                $resultSet = new ResultSet();
            } else {
                $resultSet = new HydratingResultSet(new ReflectionHydrator(), $entity);
            }
            $resultSet -> initialize($res);
            return $resultSet;
        }
        return false;
    }
}