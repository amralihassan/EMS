<?php

namespace Student\Models\Parents;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Mother extends Model
{
    use LogsActivity;

    protected $fillable =
        [
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
        'admin_id',

    ];

    protected static $logAttributes = [
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
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('M d Y, D h:i a');
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('M d Y, D h:i a');
    }

    public function nationalities()
    {
        return $this->belongsTo('Student\Models\Settings\Nationality', 'mother_nationality_id');
    }

    public function fathers()
    {
        return $this->belongsToMany('Student\Models\Parents\Father', 'father_mother', 'mother_id', 'father_id');
    }
    public function getIdTypeMAttribute()
    {
        return $this->attributes['mother_id_type'] == 'national_id' ? trans('student::local.national_id') :
        trans('student::local.passport');
    }

    public function getNationalityNameAttribute()
    {
        return session('lang') == 'ar' ? $this->nationalities->ar_female_name : $this->nationalities->en_name;
    }

    public function students()
    {
        return $this->hasMany('Student\Models\Student\Student', 'mother_id')->orderBy('dob', 'asc');
    }

    public function getIdTypeAttribute()
    {
        return $this->attributes['mother_id_type'] == 'national_id' ? trans('student::local.national_id') :
        trans('student::local.passport');
    }
}
