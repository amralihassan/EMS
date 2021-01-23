<?php

namespace Student\Models\Parents\Operations;

use App\Interfaces\IFetchData;
use Student\Models\Parents\Mother;
use App\Interfaces\IMainOperations;
use Illuminate\Support\Facades\Cache;

class MotherOp extends Mother implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return [
            'full_name',
            'mother_id_type',
            'mother_id_number',
            'mother_home_phone',
            'mother_mobile1',
            'mother_mobile2',
            'mother_job',
            'mother_email',
            'mother_qualification',
            'mother_facebook',
            'mother_whatsapp_number',
            'mother_nationality_id',
            'mother_religion',
            'mother_block_no',
            'mother_street_name',
            'mother_state',
            'mother_government',
        ];
    }

    public static function _fetchAll()
    {
        return Mother::with('fathers')->get();
    }

    public static function _fetchById($id)
    {
        return Mother::with('fathers', 'nationalities', 'students')
            ->where('id', $id)->firstOrFail();
    }

    public static function _store($request)
    {
        return $request->user()->mothers()->firstOrCreate($request->only(self::attributes()));
    }

    public static function _update($request, $id)
    {
        $mother = Mother::findOrFail($id);
        $mother->update($request->only(self::attributes()));

        Cache::flush(); // update students in redis cache
    }

    public static function _destroy($data)
    {
        return false;
    }

    public static function whereHas($father_id)
    {
        return Mother::whereHas('fathers', function ($q) use ($father_id) {
            $q->where('father_id', $father_id);
        })->get();
    }
}
