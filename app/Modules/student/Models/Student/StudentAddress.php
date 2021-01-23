<?php

namespace Student\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentAddress extends Model
{
    use LogsActivity;

    protected $table = 'student_address';

    protected $fillable = [
        'full_address',
        'student_id',
    ];

    protected static $logAttributes =
        [
        'full_address',
        'student_id',
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
}
