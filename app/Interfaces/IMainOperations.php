<?php

/**
 * Main operation store, update and destroy
 */

namespace App\Interfaces;

interface IMainOperations
{
    public static function _store($request);

    public static function _update($data, $request);

    public static function _destroy($data);
}
