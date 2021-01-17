<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Nationality;

class NationalityOp extends Nationality implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_male_name', 'ar_female_name', 'en_name', 'sort', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Nationality::sort()->get();
    }

    public static function _fetchById($id)
    {
        return Nationality::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->nationalities()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $nationality = Nationality::findOrFail($id);
        $nationality->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Nationality::destroy($id);
        }
        return true;
    }
}
