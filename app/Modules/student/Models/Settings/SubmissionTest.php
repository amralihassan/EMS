<?php

namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SubmissionTest extends Model
{
    use LogsActivity;

    protected $table = 'submission_tests';

    protected $fillable = ['ar_name', 'en_name', 'sort', 'admin_id'];

    protected static $logAttributes = ['ar_name', 'en_name', 'sort'];

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

    public function getTestNameAttribute()
    {
        return session('lang') == 'ar' ? $this->ar_name : $this->en_name;
    }

    public function grades()
    {
        return $this->belongsToMany('Student\Models\Settings\Grade', 'submission_test_grade', 'submission_test_id', 'grade_id');
    }
}
