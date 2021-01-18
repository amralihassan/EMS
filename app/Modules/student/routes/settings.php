<?php
use Illuminate\Support\Facades\Route;

// ACADEMIC YEARS
Route::resource('academic-years', 'YearController')->except('destroy', 'show');
Route::post('academic-years/destroy', 'YearController@destroy')->name('academic-years.destroy');

// DIVISIONS
Route::resource('divisions', 'DivisionController')->except('destroy', 'show');
Route::post('divisions/destroy', 'DivisionController@destroy')->name('divisions.destroy');

// STAGES
Route::resource('stages', 'StageController')->except('destroy', 'show');
Route::post('stages/destroy', 'StageController@destroy')->name('stages.destroy');

// GRADES
Route::resource('grades', 'GradeController')->except('destroy', 'show');
Route::post('grades/destroy', 'GradeController@destroy')->name('grades.destroy');

// INTERVIEWS
Route::resource('interviews', 'InterviewController')->except('destroy', 'show');
Route::post('interviews/destroy', 'InterviewController@destroy')->name('interviews.destroy');

// LANGUAGES
Route::resource('languages', 'LanguageController')->except('destroy', 'show');
Route::post('languages/destroy', 'LanguageController@destroy')->name('languages.destroy');

// NATIONALITIES
Route::resource('nationalities', 'NationalityController')->except('destroy', 'show');
Route::post('nationalities/destroy', 'NationalityController@destroy')->name('nationalities.destroy');

// REGISTRATION STATUS
Route::resource('registration-status', 'RegistrationStatusController')->except('destroy', 'show');
Route::post('registration-status/destroy', 'RegistrationStatusController@destroy')->name('registration-status.destroy');

// SCHOOLS
Route::resource('schools', 'SchoolController')->except('destroy', 'show');
Route::post('schools/destroy', 'SchoolController@destroy')->name('schools.destroy');

// STEPS
Route::resource('steps', 'StepController')->except('destroy', 'show');
Route::post('steps/destroy', 'StepController@destroy')->name('steps.destroy');

// SUBJECTS
Route::resource('subjects', 'SubjectController')->except('destroy', 'show');
Route::post('subjects/destroy', 'SubjectController@destroy')->name('subjects.destroy');

// SUBMISSION TESTS
Route::resource('submission-tests', 'SubmissionTestController')->except('destroy', 'show');
Route::post('submission-tests/destroy', 'SubmissionTestController@destroy')->name('submission-tests.destroy');

// APPLICATION DOCUMENTS
Route::resource('admission-documents', 'AdmissionDocumentController')->except('destroy', 'show');
Route::post('admission-documents/destroy', 'AdmissionDocumentController@destroy')->name('admission-documents.destroy');

// ID CARDS DESIGN
Route::resource('id-cards-designs', 'DesignController')->except('show');
Route::get('id-cards-designs/filter', 'DesignController@filter')->name('id-cards-designs.filter');
