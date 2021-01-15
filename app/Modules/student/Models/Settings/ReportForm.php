<?php

namespace Student\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportForm extends Model
{
    use LogsActivity;

    protected $table = 'report_forms';

    protected $fillable = ['accepted', 'daily_request', 'proof_enrollment', 'parent_request', 'withdrawal_request'];

    protected static $logAttributes = ['accepted', 'daily_request', 'proof_enrollment', 'parent_request', 'withdrawal_request'];

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
