<?php

namespace ErdalDemirci\GeoIPLogCleaner\Facades;

use ErdalDemirci\GeoIPLogCleaner\GeoIPLogCleaner as _Cleaner;

/**
 * Class GeoIPLogCleaner
 * @method static _Cleaner dir(string $dirname)
 * @method static _Cleaner rotate(string $dirname)
 * @method static boolean clear(string $dirname)
 *
 * @package ErdalDemirci\LogCleaner\Facades
 */
class Cleaner
{
    /**
     * Handle dynamic static method calls into the method.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        return (new _Cleaner)->$method(...$parameters);
    }
}
