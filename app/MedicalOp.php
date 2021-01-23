<?php

namespace App;

use App\Medical;

class MedicalOp extends Medical
{
    private static function attributes()
    {
        return [
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
            'coagulation'
        ];
    }

    public static function autoInsertedByEnrollStudent($request, $student_id)
    {
        return $request->user()->medicals()->firstOrCreate($request->only(self::attributes()) + ['student_id' => $student_id]);
    }
}
