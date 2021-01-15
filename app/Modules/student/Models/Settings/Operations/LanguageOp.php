<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\Language;

class LanguageOp extends Language implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'sort', 'lang_type', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return Language::latest();
    }

    public static function _fetchById($id)
    {
        return Language::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->languages()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $language = Language::findOrFail($id);
        $language->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Language::destroy($id);
        }
        return true;
    }
}
