<?php

namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Classroom extends Model
{
    use LogsActivity;

    protected $fillable = ['ar_name', 'en_name', 'sort', 'total', 'division_id', 'grade_id', 'year_id', 'admin_id'];

    protected static $logAttributes = ['ar_name', 'en_name', 'sort', 'total', 'division_id', 'grade_id', 'year_id'];

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

    public function getClassroomNameAttribute()
    {
        return session('lang') == 'ar' ? $this->ar_name : $this->en_name;
    }

    public function division()
    {
        return $this->belongsTo('Student\Models\Settings\Division', 'division_id');
    }
    public function grade()
    {
        return $this->belongsTo('Student\Models\Settings\Grade', 'grade_id');
    }
    public function year()
    {
        return $this->belongsTo('Student\Models\Settings\Year', 'year_id');
    }
}
