<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DB_Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ADMIN_PROFILE')->insert([
            'Email' => 'testroot@test.ca',
            'Password' => '',
            'FirstName' => 'TestRootFirst',
            'LastName' => 'TestRootLast',
            'RootAdmin' => true
        ]);

        DB::table('ADMIN_PROFILE')->insert([
            'Email' => 'testadmin@test.ca',
            'Password' => '',
            'FirstName' => 'TestAdminFirst',
            'LastName' => 'TestAdminLast',
            'RootAdmin' => false
        ]);

        DB::table('CONDITION_LIST')->insert([
            'Condition' => 'IBD'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Test Medication 1'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Test Medication 2'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Test Medication 3'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Test Medication 4'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Test Medication 5'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Test Medication 6'
        ]);

        DB::table('PATIENT_PROFILE')->insert([
            'Email' => 'testpatientone@test.ca',
            'Password' => '',
            'FirstName' => 'TestPatientOneFirst',
            'LastName' => 'TestPatientOneLast',
            'DOB' => date_create("30-01-1990"),
            'Gender' => 'Male',
            'Weight' => 240,
            'HeightFeet' => 6,
            'HeightInches' => 0,
            'Condition' =>'IBD',
            'Medications' => json_encode(array('Test Medication 1', 'Test Medication 4')),
            'PREMFlag' => true,
            'PROMFlag' => true,
            'NewAccount' => false,
            'PasswordReset' => "false",
        ]);

        DB::table('PATIENT_PROFILE')->insert([
            'Email' => 'testpatientotwo@test.ca',
            'Password' => '',
            'FirstName' => 'TestPatienttwoFirst',
            'LastName' => 'TestPatienttwoLast',
            'DOB' => date_create("12-01-2000"),
            'Gender' => 'Female',
            'Weight' => 180,
            'HeightFeet' => 5,
            'HeightInches' => 7,
            'Condition' =>'IBD',
            'Medications' => json_encode(array('Test Medication 2')),
            'PREMFlag' => true,
            'PROMFlag' => true,
            'NewAccount' => true,
            'PasswordReset' => "false",
        ]);

        $testQuestions1 = array(array('Text' => 'Text for test question 1' , 'Type' => 'DropDown' , 'PossibleResponses' => 'Option1,Option2,Option3'),
                            array('Text' => 'Text for test question 2' , 'Type' => 'Checkbox' , 'PossibleResponses' => 'Option1,Option2,Option3'));

        $testQuestions2 = array(array('Text' => 'Text for test question 1' , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Option1,Option2,Option3'),
                            array('Text' => 'Text for test question 2' , 'Type' => 'FreeText' , 'PossibleResponses' => ''));

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'IBDPREM_One',
            'ConditionServed' => 'IDB',
            'SurveyType' => 'PREM',
            'SurveyQuestions' => json_encode($testQuestions1)
        ]);

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'IBDPREM_Two',
            'ConditionServed' => 'IDB',
            'SurveyType' => 'PREM',
            'SurveyQuestions' => json_encode($testQuestions2)
        ]);

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'IBDPROM_One',
            'ConditionServed' => 'IDB',
            'SurveyType' => 'PROM',
            'SurveyQuestions' => json_encode($testQuestions1)
        ]);

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'IBDPROM_Two',
            'ConditionServed' => 'IDB',
            'SurveyType' => 'PROM',
            'SurveyQuestions' => json_encode($testQuestions2)
        ]);
    }
}
