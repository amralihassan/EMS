<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Settings\AdmissionDocument;

class AdmissionDocumentOp extends AdmissionDocument implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'notes', 'registration_type', 'sort', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return AdmissionDocument::latest();
    }

    public static function _fetchById($id)
    {
        return AdmissionDocument::findOrFail($id);
    }

    public static function _store($request)
    {
        $request->user()->admissionDocuments()->firstOrCreate($request->only(self::attributes()));
        return true;
    }

    public static function _update($request, $id)
    {
        $year = AdmissionDocument::findOrFail($id);
        $year->update($request->only(self::attributes()));
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            AdmissionDocument::destroy($id);
        }
        return true;
    }
}
