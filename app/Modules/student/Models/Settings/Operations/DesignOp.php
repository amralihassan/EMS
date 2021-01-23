<?php

namespace Student\Models\Settings\Operations;

use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use DB;
use Intervention\Image\Facades\Image;
use Student\Models\Settings\Design;

class DesignOp extends Design implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return ['default'];
    }

    public static function _fetchAll()
    {
        return Design::with('grades', 'divisions')->orderBy('id', 'desc')->paginate(6);
    }

    public static function _fetchById($id)
    {
        return Design::findOrFail($id);
    }

    public static function _store($request)
    {
        DB::transaction(function () use ($request) {
            $design = $request->user()->designs()->create($request->only(self::attributes()));

            if ($request->hasFile('file_name')) {
                self::upload($request, $design);
            }

            $design->grades()->attach($request->grade_id);
            $design->divisions()->attach($request->division_id);

        });
        return true;
    }

    private static function upload($request, $design)
    {
        $image = $request->file('file_name');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(220, 150)->save(public_path('storage/id-designs/' . $filename));
        $design->file_name = $filename;
        $design->save();
    }

    public static function _update($request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $design = Design::findOrFail($id);
            $design->update($request->only(self::attributes()));

            if ($request->hasFile('file_name')) {
                if (file_exists('storage/id-designs/' . $design->file_name)) {
                    unlink('storage/id-designs/' . $design->file_name);
                }

                self::upload($request, $design);
            }

            $design->grades()->sync($request->grade_id);
            $design->divisions()->sync($request->division_id);
        });
    }

    public static function _destroy($id)
    {
        $design = Design::findOrFail($id);
        if (file_exists('storage/id-designs/' . $design->file_name)) {
            unlink('storage/id-designs/' . $design->file_name);
        }
        $design->delete();
        return true;
    }

    public static function _fetchByQuery()
    {
        $design = Design::with('grades', 'divisions');

        if (!empty(request('division_id'))) {
            $design->whereHas('divisions', function ($q) {
                $q->Where('division_id', request('division_id'));
            });
        }

        if (!empty(request('grade_id'))) {
            $design->whereHas('grades', function ($q) {
                $q->Where('grade_id', request('grade_id'));
            });
        }

        return $design->orderBy('id', 'desc')->paginate(6);
    }
}
