<?php

namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class School extends Model
{
    use LogsActivity;

    protected $fillable = ['ar_name', 'en_name', 'school_type', 'school_government', 'school_address', 'admin_id'];

    protected static $logAttributes = ['ar_name', 'en_name', 'school_type', 'school_government', 'school_address'];

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

    public function getSchoolNameAttribute()
    {
        return session('lang') == 'ar' ? $this->ar_name : $this->en_name;
    }
}