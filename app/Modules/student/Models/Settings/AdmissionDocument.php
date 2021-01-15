<?php

namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AdmissionDocument extends Model
{
    use LogsActivity;

    protected $table = 'admission_documents';

    protected $fillable = ['ar_name', 'en_name', 'notes', 'registration_type', 'sort', 'admin_id'];

    protected static $logAttributes = ['ar_name', 'en_name', 'notes', 'registration_type', 'sort'];

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

    public function grades()
    {
        return $this->belongsToMany('Student\Models\Settings\Grade', 'admission_document_grade', 'admission_document_id', 'grade_id');
    }
}
