<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Medical extends Model
{
    use LogsActivity;

    protected $fillable = [
        'student_id',
        'blood_type',
        'food_sensitivity',
        'medicine_sensitivity',
        'other_sensitivity',
        'have_medicine',
        'vision_problem',
        'use_glasses',
        'hearing_problems',
        'speaking_problems',
        'chest_pain',
        'breath_problem',
        'asthma',
        'have_asthma_medicine',
        'heart_problem',
        'hypertension',
        'diabetic',
        'anemia',
        'cracking_blood',
        'coagulation',
        'admin_id',

    ];

    protected static $logAttributes = [
        'student_id',
        'blood_type',
        'food_sensitivity',
        'medicine_sensitivity',
        'other_sensitivity',
        'have_medicine',
        'vision_problem',
        'use_glasses',
        'hearing_problems',
        'speaking_problems',
        'chest_pain',
        'breath_problem',
        'asthma',
        'have_asthma_medicine',
        'heart_problem',
        'hypertension',
        'diabetic',
        'anemia',
        'cracking_blood',
        'coagulation',
        'admin_id'
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
