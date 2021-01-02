<?php

/**
 * Fetch all data, by ID or by query
 */

namespace App\Interfaces;

interface IFetchData
{
    public static function _fetchAll();

    public static function _fetchById($id);
}
