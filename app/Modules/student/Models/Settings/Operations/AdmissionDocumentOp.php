<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use DB;
use Student\Models\Settings\AdmissionDocument;

class AdmissionDocumentOp extends AdmissionDocument implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['ar_name', 'en_name', 'notes', 'registration_type', 'sort', 'admin_id'];
    }

    public static function _fetchAll()
    {
        return AdmissionDocument::sort()->get();
    }

    public static function _fetchById($id)
    {
        return AdmissionDocument::findOrFail($id);
    }

    public static function _store($request)
    {
        DB::transaction(function () use ($request) {
            $document = $request->user()->admissionDocuments()->firstOrCreate($request->only(self::attributes()));
            $document->grades()->attach($request->grade_id);
        });
        return true;
    }

    public static function _update($request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $document = AdmissionDocument::findOrFail($id);
            $document->update($request->only(self::attributes()));
            $document->grades()->sync($request->grade_id);
        });
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            AdmissionDocument::destroy($id);
        }
        return true;
    }
}
