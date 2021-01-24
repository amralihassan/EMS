<?php
namespace Student\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Student extends Model
{
    use LogsActivity;

    protected $fillable = [
        'father_id',
        'mother_id',
        'employee_id',
        'student_type',
        'ar_student_name',
        'en_student_name',
        'student_id_number',
        'student_id_type',
        'student_number',
        'gender',
        'nationality_id',
        'religion',
        'native_lang_id',
        'second_lang_id',
        'term',
        'dob',
        'code',
        'reg_type',
        'grade_id',
        'division_id',
        'student_image',
        'submitted_application',
        'submitted_name',
        'submitted_id_number',
        'submitted_mobile',
        'school_id',
        'transfer_reason',
        'application_date',
        'guardian_id',
        'place_birth',
        'return_country',
        'registration_status_id',
        'year_id',
        'admin_id',
        'siblings',
        'twins',
        'user_id',
    ];

    protected static $logAttributes =
        [
        'father_id',
        'mother_id',
        'employee_id',
        'student_type',
        'ar_student_name',
        'en_student_name',
        'student_id_number',
        'student_id_type',
        'student_number',
        'gender',
        'nationality_id',
        'religion',
        'native_lang_id',
        'second_lang_id',
        'term',
        'dob',
        'code',
        'reg_type',
        'grade_id',
        'division_id',
        'student_image',
        'submitted_application',
        'submitted_name',
        'submitted_id_number',
        'submitted_mobile',
        'school_id',
        'transfer_reason',
        'application_date',
        'guardian_id',
        'place_birth',
        'return_country',
        'registration_status_id',
        'year_id',
        'admin_id',
        'siblings',
        'twins',
        'user_id',
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

    public function nationalities()
    {
        return $this->belongsTo('Student\Models\Settings\Nationality', 'nationality_id');
    }

    public function regStatus()
    {
        return $this->belongsTo('Student\Models\Settings\RegistrationStatus', 'registration_status_id');
    }

    public function division()
    {
        return $this->belongsTo('Student\Models\Settings\Division', 'division_id')->orderBy('sort', 'asc');
    }

    public function father()
    {
        return $this->belongsTo('Student\Models\Parents\Father', 'father_id');
    }

    public function mother()
    {
        return $this->belongsTo('Student\Models\Parents\Mother', 'mother_id');
    }

    public function grade()
    {
        return $this->belongsTo('Student\Models\Settings\Grade', 'grade_id')->orderBy('sort', 'asc');
    }

    public function guardian()
    {
        return $this->belongsTo('Student\Models\Parents\Guardian', 'guardian_id');
    }

    public function native()
    {
        return $this->belongsTo('Student\Models\Settings\Language', 'native_lang_id');
    }

    public function languages()
    {
        return $this->belongsTo('Student\Models\Settings\Language', 'second_lang_id');
    }

    public function getRegTypeAttribute($value)
    {
        switch ($value) {
            case 'new':return trans('student::local.new');
            case 'transfer':return trans('student::local.transfer');
            case 'arrival':return trans('student::local.arrival');
            case 'return':return trans('student::local.return');
        }
    }

    public function setEnStudentNameAttribute($value)
    {
        return $this->attributes['en_student_name'] = ucfirst($value);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    // get full name for student
    public function getStudentNameAttribute()
    {
        if (session('lang') == 'ar') {
            return $this->ar_student_name . ' ' . $this->father->ar_st_name . ' ' . $this->father->ar_nd_name . ' ' . $this->father->ar_rd_name;
        } else {
            return $this->en_student_name . ' ' . $this->father->en_st_name . ' ' . $this->father->en_nd_name . ' ' . $this->father->en_rd_name;
        }
    }
    // name for student
    public function getStudentShortNameAttribute()
    {
        if (session('lang') == 'ar') {
            return $this->ar_student_name . ' ' . $this->father->ar_st_name;
        } else {
            return $this->en_student_name . ' ' . $this->father->en_st_name;
        }
    }
    // get full name for student and student number
    public function getNationalityAttribute()
    {
        if (session('lang') == 'ar') {
            if ($this->gender == trans('student::local.male')) {
                return $this->nationalities->ar_male_name;
            } else {
                return $this->nationalities->ar_female_name;
            }
        } else {
            return $this->nationalities->en_name_nationality;
        }
    }

    public function getStudentImagePathAttribute()
    {
        if ($this->student_image) {
            return 'storage/student-images/' . $this->student_image;
        }
        return $this->gender == 'male' ?
        'storage/student-images/37.png' : 'storage/student-images/39.png';
    }

    public function scopeSort($q)
    {
        return $q->orderBy('ar_student_name');
    }

    public function getReligionMaleAttribute()
    {
        return $this->attributes['religion'] == 'muslim' ? trans('student::local.muslim') : trans('student::local.non_muslim');
    }

    public function getReligionFemaleAttribute()
    {
        return $this->attributes['religion'] == 'muslim' ? trans('student::local.muslim_m') : trans('student::local.non_muslim_m');
    }

    public function scopeStudent($q)
    {
        return $q->where('student_type', 'student');
    }

    public function steps()
    {
        return $this->belongsToMany('Student\Models\Settings\Step', 'student_step', 'student_id', 'step_id');
    }

    public function addresses()
    {
        return $this->hasMany('Student\Models\Student\StudentAddress', 'student_id');
    }

    public function classrooms()
    {
        return $this->belongsToMany('Student\Models\Settings\Classroom', 'student_classroom', 'student_id', 'classroom_id');
    }

    public function documents()
    {
        return $this->belongsToMany('Student\Models\Settings\AdmissionDocument', 'student_document', 'student_id', 'admission_document_id');
    }

}
