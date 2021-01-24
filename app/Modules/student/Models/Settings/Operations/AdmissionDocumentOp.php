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
        return ['ar_name', 'en_name', 'notes', 'sort', 'admin_id'];
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
            $document = $request->user()->admissionDocuments()
                ->firstOrCreate($request->only(self::attributes())
                     + ['registration_type' => implode(",", $request->registration_type)]);

            $document->grades()->attach($request->grade_id);
        });
        return true;
    }

    public static function _update($request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $document = AdmissionDocument::findOrFail($id);
            $document->update($request->only(self::attributes())
                 + ['registration_type' => implode(",", $request->registration_type)]);
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

    public static function admissionDocumentByGrade($grade_id)
    {
        return AdmissionDocument::with('grades')
            ->whereHas('grades', function ($q) use ($grade_id) {
                $q->where('grade_id', $grade_id);
            })->get();
    }

    public static function _fetchByQuery($student_id, $admission_document_id)
    {
        return DB::table('student_document')
            ->select('admission_document_id')
            ->where('student_id', $student_id)
            ->where('admission_document_id', $admission_document_id)
            ->first();
    }
}
