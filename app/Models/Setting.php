<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    protected $fillable = [
        'ar_school_name', 'en_school_name', 'logo', 'icon', 'email', 'address', 'contact1', 'contact2',
        'contact3', 'facebook', 'youtube', 'status', 'ar_education_administration',
        'en_education_administration', 'ar_governorate', 'en_governorate', 'msg_maintenance', 'admin_id',
    ];

    public function admin()
    {
        return $this->BelongsTo(Admin::class, 'admin_id');
    }

    public function getStatusAttribute($value)
    {
        return $value == 'open' ? trans('local.open') : trans('local.close');
    }

    public function getLogoImageAttribute()
    {
        if (!empty($this->logo)) {
            return 'storage/settings/'.settings()->logo;
        }else{
            return 'app-assets/images/logo/logo.png';
        }
    }

    public function getIconImageAttribute()
    {
        if (!empty($this->icon)) {
            return 'storage/settings/'.settings()->icon;
        }else{
            return 'storage/settings/icon.ico';
        }
    }
}
