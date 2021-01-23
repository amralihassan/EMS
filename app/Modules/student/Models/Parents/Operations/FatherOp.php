<?php
namespace Student\Models\Parents\Operations;

use App\Interfaces\IFetchData;
use Student\Models\Parents\Father;
use App\Interfaces\IMainOperations;
use Illuminate\Support\Facades\Cache;

class FatherOp extends Father implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return [
            'ar_st_name',
            'ar_nd_name',
            'ar_rd_name',
            'ar_th_name',
            'en_st_name',
            'en_nd_name',
            'en_rd_name',
            'en_th_name',
            'father_id_type',
            'father_id_number',
            'father_religion',
            'father_nationality_id',
            'father_home_phone',
            'father_mobile1',
            'father_mobile2',
            'father_email',
            'father_job',
            'father_qualification',
            'father_facebook',
            'father_whatsapp_number',
            'father_block_no',
            'father_street_name',
            'father_state',
            'father_government',
            'educational_mandate',
            'marital_status',
            'recognition',
        ];
    }

    public static function _fetchAll()
    {
        return Father::with('mothers', 'nationalities')->get();
    }

    public static function _fetchById($id)
    {
        return Father::with('mothers', 'nationalities', 'students')
            ->where('id', $id)->firstOrFail();
    }

    public static function _store($request)
    {
        return $request->user()->fathers()->firstOrCreate($request->only(self::attributes()));
    }

    public static function fatherMotherRelation($father, $mother)
    {
        $father->mothers()->attach($mother);
    }

    public static function _update($request, $id)
    {
        $father = Father::findOrFail($id);
        $father->update($request->only(self::attributes()));

        Cache::flush(); // update students in redis cache
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            $father = Father::findOrFail($id);
            $father->mothers()->detach();
            $father = Father::destroy($id);
        }
        return true;
    }

    public static function getFatherName($id)
    {
        $father = Father::findOrFail($id);
        return $father->father_name;
    }
}
