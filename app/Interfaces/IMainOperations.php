<?php

/**
 * Main operation store, update and destroy
 */

namespace App\Interfaces;

interface IMainOperations
{
    public static function _store($request);

    public static function _update($request, $data);

    public static function _destroy($data);
}
