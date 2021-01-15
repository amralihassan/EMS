<?php

namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Division extends Model
{
    use LogsActivity;

    protected $fillable = ['ar_name', 'en_name', 'sort', 'total', 'ar_school_name', 'en_school_name', 'admin_id'];

    protected static $logAttributes = ['ar_name', 'en_name', 'sort', 'total', 'ar_school_name', 'en_school_name'];

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

    public function getDivisionNameAttribute()
    {
        return session('lang') == 'ar' ? $this->ar_name : $this->en_name;
    }
}
