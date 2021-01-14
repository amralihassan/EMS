<?php
namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Year extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'start_from', 'end_in', 'active_year', 'admin_id', 'open_close_year'];

    protected static $logAttributes = ['name', 'start_from', 'end_in', 'active_year', 'open_close_year'];

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

    public function getActiveYearAttribute($value)
    {
        return $value == 'current' ? trans('student::local.current') : trans('student::local.not_current');
    }

    public function getOpenCloseYearAttribute($value)
    {
        return $value == 'open' ? trans('student::local.open') : trans('student::local.close');
    }

    public function scopeCurrent($q)
    {
        return $q->where('status', 'current');
    }
    public function scopeOpen($q)
    {
        return $q->where('year_status', 'open');
    }

}
