<?php
namespace Student\Models\Student\Operations;

use DB;
use App\MedicalOp;
use App\Interfaces\IFetchData;
use App\Interfaces\IMainOperations;
use Student\Models\Student\Student;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Student\Models\Student\StudentAddress;
use Student\Models\Settings\Operations\GradeOp;

class StudentOp extends Student implements IFetchData, IMainOperations
{
    private static function attributes()
    {
        return [
            'father_id',
            'mother_id',
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
        ];
    }

    private static function medicalAttributes()
    {
        return [
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
    }

    public static function _fetchAll()
    {
        return Student::with('nationalities', 'regStatus', 'division', 'father', 'mother', 'grade', 'guardian', 'native', 'languages')
            ->get();
    }

    public static function _fetchById($id)
    {
        return Student::with('nationalities', 'regStatus', 'division', 'father', 'mother', 'grade', 'guardian', 'native', 'languages')
            ->where('id', $id)
            ->firstOrFail();
    }

    public static function _store($request)
    {
        DB::transaction(function () use ($request) {
            $student = $request->user()->students()->firstOrCreate($request->only(self::attributes()) + [
                'student_number' => self::studentNumber($request),
                'code' => self::studentCode($request),
                'year_id' => currentYear(),
            ]);

            // upload student image
            self::uploadStudentImage($student, $request);

            // student steps
            $student->steps()->attach($request->steps);

            // student documents
            $student->documents()->attach($request->documents);

            // medical
            MedicalOp::autoInsertedByEnrollStudent($request, $student->id);
            // add student address
            self::studentAddresses($student->id);

            // Get brothers / sisters and twins
            self::updateTwinsAndSiblings($student);

        });
    }

    // upload student image
    private static function uploadStudentImage($student, $request)
    {
        if ($request->hasFile('student_image')) {
            $image = $request->file('student_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(46, 46)->save(public_path('storage/student-images/' . $filename));
            $student->student_image = $filename;
            $student->save();
        }
    }

    private static function studentAddresses($student_id)
    {
        if (request()->has('repeater-group')) {

            StudentAddress::where('student_id', $student_id)->delete();

            foreach (request('repeater-group') as $address) {
                foreach ($address as $value) {
                    if (!empty($value)) {

                        StudentAddress::firstOrCreate(
                            [
                                'full_address' => $value,
                                'student_id' => $student_id,
                            ]
                        );
                    }
                }
            }
        }
    }

    // create student number
    private static function studentNumber($request)
    {
        return getYearAcademic() . $request->grade_id . $request->division_id . self::studentCode($request);
    }

    // create student code
    private static function studentCode($request)
    {
        return Student::where([
            'year_id' => currentYear(),
            'division_id' => $request->division_id,
        ])->max('code') + 1;
    }

    public static function _update($request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->only(self::attributes()));

        Cache::flush(); // update students in redis cache
    }

    public static function _destroy($data)
    {
        foreach (request('id') as $id) {
            Student::destroy($id);
        }

        Cache::flush(); // update students in redis cache
        return true;
    }

    // Ensure that the age fits the stage
    public static function checkAgeForGrade()
    {
        //  calculate age
        $age = getStudentAge(request('dob'));
        $dd = 0;
        $mm = 0;
        $yy = 0;

        $mm = $age['mm'];
        $yy = $age['yy'];
        $grade_data = GradeOp::_fetchById(request('grade_id'));

        if ($yy != 0) {
            if ($yy > $grade_data->to_age_year) {
                return 'older';
            } elseif ($yy == $grade_data->to_age_year) {
                if ($mm > $grade_data->to_age_month) {
                    return 'older';
                }
            }
        }
        if ($yy != 0) {
            if ($yy < $grade_data->from_age_year) {
                return 'smaller';
            } elseif ($yy == $grade_data->from_age_year) {
                if ($mm < $grade_data->from_age_month) {
                    return 'smaller';
                }
            }
        }
        if ($yy == 0) {
            return 'invalid';
        } else {
            return [
                'dd' => $dd,
                'mm' => $mm,
                'yy' => $yy,
            ];
        }
    }

    public static function fetchByFatherId($father_id)
    {
        return Student::where('father_id', $father_id)->get();
    }

    // Get brothers / sisters and twins
    private static function updateTwinsAndSiblings($student)
    {
        // get all brothers and sisters
        $students = self::fetchByFatherId($student->father_id);

        if (count($students) > 1) {
            foreach ($students as $student_data) {
                // update siblings
                Student::where('id', $student_data->id)->update(['siblings' => 'true']);

                // update twins
                $students_id = [];
                if (($student->dob == $student_data->dob) && $student_data->id != $student->id) {
                    $students_id[] = $student_data->id;
                }

                if (count($students_id) >= 1) {
                    $students_id[] = $student->id;
                    Student::whereIn('id', $students_id)->update(['twins' => 'true']);
                }
            }
        }
    }

}
