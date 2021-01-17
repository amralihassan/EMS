<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ar_name', 'en_name', 'email', 'password', 'lang', 'image_profile', 'status', 'username',
    ];

    protected static $logAttributes = ['ar_name', 'en_name', 'email', 'username', 'email', 'status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function username()
    {
        return 'username';
    }

    public function getAdminNameAttribute()
    {
        return session('lang') == 'ar' ? $this->ar_name : $this->en_name;
    }

    public function getStatusAttribute($value)
    {
        return $value == 'enable' ? trans('local.enable') : trans('local.disable');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getProfileImageAttribute()
    {
        if (!empty($this->image_profile)) {
            return 'storage/admins/' . authInfo()->image_profile;
        } else {
            return 'storage/admins/profile.png';
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('M d Y, D h:i a');
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('M d Y, D h:i a');
    }

    public function years()
    {
        return $this->hasMany('Student\Models\Settings\Year', 'admin_id');
    }

    public function admissionDocuments()
    {
        return $this->hasMany('Student\Models\Settings\AdmissionDocument', 'admin_id');
    }

    public function classrooms()
    {
        return $this->hasMany('Student\Models\Settings\Classroom', 'admin_id');
    }

    public function designs()
    {
        return $this->hasMany('Student\Models\Settings\Design', 'admin_id');
    }

    public function divisions()
    {
        return $this->hasMany('Student\Models\Settings\Division', 'admin_id');
    }

    public function grades()
    {
        return $this->hasMany('Student\Models\Settings\Grade', 'admin_id');
    }

    public function interviews()
    {
        return $this->hasMany('Student\Models\Settings\Interview', 'admin_id');
    }

    public function languages()
    {
        return $this->hasMany('Student\Models\Settings\Language', 'admin_id');
    }

    public function nationalities()
    {
        return $this->hasMany('Student\Models\Settings\Nationality', 'admin_id');
    }

    public function registrationStatus()
    {
        return $this->hasMany('Student\Models\Settings\RegistrationStatus', 'admin_id');
    }

    public function schools()
    {
        return $this->hasMany('Student\Models\Settings\School', 'admin_id');
    }

    public function stages()
    {
        return $this->hasMany('Student\Models\Settings\Stage', 'admin_id');
    }

    public function steps()
    {
        return $this->hasMany('Student\Models\Settings\Step', 'admin_id');
    }

    public function subjects()
    {
        return $this->hasMany('Student\Models\Settings\Subject', 'admin_id');
    }

    public function submissionTests()
    {
        return $this->hasMany('Student\Models\Settings\SubmissionTest', 'admin_id');
    }
}
