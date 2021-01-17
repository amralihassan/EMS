<?php

namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Grade extends Model
{
    use LogsActivity;

    protected $fillable = ['ar_name', 'en_name', 'ar_online_name', 'en_online_name', 'from_age_year', 'from_age_month', 'to_age_year', 'to_age_month', 'sort', 'end_stage', 'admin_id', 'stage_id'];

    protected static $logAttributes = ['ar_name', 'en_name', 'ar_online_name', 'en_online_name', 'from_age_year', 'from_age_month', 'to_age_year', 'to_age_month', 'sort', 'end_stage', 'stage_id'];

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

    public function scopeSort($query)
    {
        return $query->orderBy('sort', 'asc');
    }

    public function getGradeNameAttribute()
    {
        return session('lang') == 'ar' ? $this->ar_name : $this->en_name;
    }

    public function getEndStageAttribute($value)
    {
        return $value == 'yes' ? trans('local.yes') : trans('local.no');
    }

    public function stage()
    {
        return $this->belongsTo('Student\Models\Settings\Stage', 'stage_id');
    }

    public function getStageNameAttribute()
    {
        return session('lang') == 'ar' ? $this->stage->ar_name : $this->stage->en_name;
    }
}
