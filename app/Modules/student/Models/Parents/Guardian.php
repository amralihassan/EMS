<?php

namespace Student\Models\Parents;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Guardian extends Model
{
    use LogsActivity;

    protected $fillable =
        [
        'full_name',
        'type',
        'id_type',
        'id_number',
        'mobile1',
        'mobile2',
        'job',
        'email',
        'block_no',
        'street_name',
        'state',
        'government',
        'admin_id',
    ];

    protected static $logAttributes = [
        'full_name',
        'type',
        'id_type',
        'id_number',
        'mobile1',
        'mobile2',
        'job',
        'email',
        'block_no',
        'street_name',
        'state',
        'government',
        'admin_id',
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
