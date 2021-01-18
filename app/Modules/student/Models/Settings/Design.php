<?php

namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Design extends Model
{
    use LogsActivity;

    protected $fillable = ['file_name', 'default', 'admin_id'];

    protected static $logAttributes = ['file_name', 'default'];

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

    public function divisions()
    {
        return $this->belongsToMany('Student\Models\Settings\Division', 'design_division', 'design_id', 'division_id');
    }

    public function grades()
    {
        return $this->belongsToMany('Student\Models\Settings\Grade', 'design_grade', 'design_id', 'grade_id');
    }
}
