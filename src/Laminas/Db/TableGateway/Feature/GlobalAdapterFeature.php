<?php


namespace Bridge\Laminas\Db\TableGateway\Feature;


use Bridge\Laminas\Db\Adapter\Adapter;

class GlobalAdapterFeature extends \Laminas\Db\TableGateway\Feature\GlobalAdapterFeature
{

    /**
     * @param Adapter $adapter
     */
    public static function setStaticMasterAdapter(Adapter $adapter): void
    {
        parent ::setStaticAdapter($adapter);
    }

    /**
     * @return Adapter
     */
    public static function getStaticMasterAdapter(): Adapter
    {
        return parent ::getStaticAdapter();
    }

    /**
     * @param Adapter $adapter
     */
    public static function setStaticSlaveAdapter(Adapter $adapter): void
    {
        static ::$staticAdapters['__slave__'] = $adapter;
    }

    /**
     * @return Adapter
     */
    public static function getStaticSlaveAdapter(): Adapter
    {
        return static ::$staticAdapters['__slave__'];
    }
}