<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'jboelhouwer@upei.ca',
            'password' => Hash::make('jessePass'),
            'FirstName' => 'Jesse',
            'LastName' => 'Boelhouwer',
            'RootAdmin' => true
        ]);

        DB::table('ADMIN_PROFILE')->insert([
            'email' => 'mrahman2@upei.ca',
            'password' => Hash::make('minhajPass'),
            'FirstName' => 'Minhajur',
            'LastName' => 'Rahman',
            'RootAdmin' => true
        ]);

        DB::table('ADMIN_PROFILE')->insert([
            'email' => 'shindawi@upei.ca',
            'password' => Hash::make('saraPass'),
            'FirstName' => 'Sara',
            'LastName' => 'Hindawi',
            'RootAdmin' => true
        ]);

        DB::table('ADMIN_PROFILE')->insert([
            'email' => 'nmayaleh@upei.ca',
            'password' => Hash::make('nairouzPass'),
            'FirstName' => 'Nairouz',
            'LastName' => 'Mayaleh',
            'RootAdmin' => true
        ]);

        DB::table('ADMIN_PROFILE')->insert([
            'email' => 'mmayaleh@upei.ca',
            'password' => Hash::make('majdPass'),
            'FirstName' => 'Majd',
            'LastName' => 'Mayaleh',
            'RootAdmin' => true
        ]);

        DB::table('ADMIN_PROFILE')->insert([
            'email' => 'jsethdavid@upei.ca ',
            'password' => Hash::make('jessiePass'),
            'FirstName' => 'Jessie',
            'LastName' => 'Sethdavid',
            'RootAdmin' => true
        ]);

        DB::table('ADMIN_PROFILE')->insert([
            'email' => 'testadmin@test.ca',
            'password' => Hash::make('adminPass'),
            'FirstName' => 'TestAdminFirst',
            'LastName' => 'TestAdminLast',
            'RootAdmin' => false
        ]);

        DB::table('CONDITION_LIST')->insert([
            'Condition' => 'IBD'
        ]);


        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Oral Steroids (Prendisone, Budesonide)'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Rectal Steroids'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Oral 5-ASA or Sulfasalazine (Pentasa, Asacol, Salofalk etc)'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Rectal 5-ASA (enemas,suppositories or foam- Salofalk)'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Azathioprine'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Mercaptopurine'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Methortrexate'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Ustekinumab (Stelara)'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Vedolizumab (Entyvio)'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Adalimumab (Humira)'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Infliximab (Remicade)'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Golimumab (Simponi)'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Biosimilars'
        ]);

        DB::table('MEDICATION_LIST')->insert([
            'MedicationName' => 'Tofacitinib'
        ]);

        DB::table('PATIENT_PROFILE')->insert([
            'email' => 'jboelhouwer@upei.ca',
            'password' => Hash::make('patientOne'),
            'FirstName' => 'TestPatientOneFirst',
            'LastName' => 'TestPatientOneLast',
            'DOB' => date_create("30-01-1990"),
            'Gender' => 'Male',
            'Weight' => 240,
            'Height' => 160,
            'Condition' =>'IBD',
            'Medications' => json_encode(array('Test Medication 1', 'Test Medication 4')),
            'PREMFlag' => true,
            'PROMFlag' => true,
            'NewAccount' => false,
            'PasswordReset' => "false",
        ]);

        DB::table('PATIENT_PROFILE')->insert([
            'Email' => 'testpatientotwo@test.ca',
            'Password' => Hash::make('patientTwo'),
            'FirstName' => 'TestPatienttwoFirst',
            'LastName' => 'TestPatienttwoLast',
            'DOB' => date_create("12-01-2000"),
            'Gender' => 'Female',
            'Weight' => 180,
            'Height' => 170,
            'Condition' =>'IBD',
            'Medications' => json_encode(array('Test Medication 2')),
            'PREMFlag' => true,
            'PROMFlag' => true,
            'NewAccount' => true,
            'PasswordReset' => "false",
            ]);

        $GNOSHquestions = array(array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .'In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had aches in my stomach or abdomen.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had difficulty coordinating and managing defecation, including choosing and getting to an appropriate place for defecation and cleaning myself afterwards.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had difficulty with personal relationships and/or difficulty participating in the community.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had difficulty with school or studying activities, and/or difficulty with work or household actives.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had difficulty sleeping, such as falling asleep, waking up frequently during the night or waking up too early in the morning.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have not felt rested and refreshed during the day and have felt tired and without energy.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have felt sad,low or depressed, and/or worried or anxious.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have not like the way my body or body parts look.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had difficulty with the mental and/or physical aspects of sex.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                  .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had pain in the joints of my body.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Do not agree,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Absolutely Agree'),
                    );

        $QOLquestions = array(array('Text' => 'How frequent have your bowel movements been during the last two weeks?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - More frequent than they have ever been,2 - Extremely frequent,3 - Very frequent,4 - Moderate increase in frequency,5 - Some increase in frequency,6 - Slight increase in frequency,7 - Normal or no increase in frequency'),
                          array('Text' => 'How often has the feeling of fatigue or of being tired and worn out been a problem for you during the last 2 weeks?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - More frequent than I have ever experienced,2 - Extremely frequent,3 - Very frequent,4 - Moderately frequent,5 - Now and then,6 - Infrequently,7 - No more than normal'),
                          array('Text' => 'How often during the past two weeks have you felt frustrated, impatient, or restless because of your bowel problem?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - More often than ever before,2 - Extremely often,3 - Very often,4 - Somewhat often,5 - Slightly often, 6 - Infrequently,7 - Never'),
                          array('Text' => 'How often during the last 2 weeks have you been unable to attend school or work due to your bowel problem?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Higher than 8 days,2 - 6 or 7 days, 3 - 4 or 5 days  ,4 - 2 or 3 days,5 - 1 day,6 - Partial day,7 - No missed attendance'),
                          array('Text' => 'How often of the time during the last 2 weeks have your bowel movements been loose?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - More frequent than ever experienced,2 - Extremely frequent,3 - Very frequent,4 - Moderately frequent,5 - Some frequency,6 - Slightly frequent,7 - Never'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - '),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                    .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have felt sad,low or depressed, and/or worried or anxious.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0,1,2,3,4,5,6,7,8,9,10'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                    .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have not like the way my body or body parts look.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0,1,2,3,4,5,6,7,8,9,10'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                    .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had difficulty with the mental and/or physical aspects of sex.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0,1,2,3,4,5,6,7,8,9,10'),
                          array('Text' => 'On a scale of 1-10 how much would you agree with the following statement:'
                                .' In the last week, because of my Crohn' . "'s". ' disease or ulcerative colitis I have had pain in the joints of my body.' , 'Type' => 'DropDown' , 'PossibleResponses' => '0,1,2,3,4,5,6,7,8,9,10'),
                        );

        $GADquestions = array(array('Text' => 'Over the past 2 weeks how often have you felt nervous, anxious, or on edge?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => 'Not at all sure,Several days,Over half the days,Nearly every day'),
                          array('Text' => 'Over the last 2 weeks how often have you felt as if you could not stop ir control worrying?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => 'Not at all sure,Several days,Over half the days,Nearly every day'),
                          array('Text' => 'Over the past 2 weeks how often have you had trouble relaxing?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => 'Not at all sure,Several days,Over half the days,Nearly every day'),
                          array('Text' => 'Over the past2 weeks how often have you been so restless that it has been hard to sit still?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => 'Not at all sure,Several days,Over half the days,Nearly every day'),
                          array('Text' => 'Over the past 2 weeks how often have you experienced becoming easily annoyed or have been irritable?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => 'Not at all sure,Several days,Over half the days,Nearly every day'),
                          array('Text' => 'Over the past 2 weeks how often have you experienced feelings of being afraid as if something awful might happen?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => 'Not at all sure,Several days,Over half the days,Nearly every day'),
                        );

        $MOSQquestions = array(array('Text' => 'In general you would say your health is:'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Excellent,2 - Very good,3 - Good,4 - Fair,5 - Poor'),
                          array('Text' => 'Compared to one year ago you would say your health now is:'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Much better than one year ago,2 - Somewhat better than one year ago,3 - About the same,4 - Somewhat worse than one year ago,5 - Much worse than one year ago'),
                          array('Text' => 'Does your health now limit you in completing vigorous activities such as running,lighting heavy objects, participating in strenuous sports?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'Does your health now limit you in lifting or carrying groceries?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'Does your health now limit you in climbing several flights of stairs?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'Does your health now limit you in climbing one flight of stairs?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'Does your health now limit you in bending, kneeling, or stooping?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'Does your health now limit you in walking more than a mile?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'Does your health now limit you in walking several blocks?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'Does your health now limit you in walking one one block?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'Does your health now limit you in bathing or dressing yourself?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes Limited a Lot,2 - Yes Limited a Little,3 - No Not Limited at All'),
                          array('Text' => 'During the past 4 weeks as a result of any emotional problems have you had to cut down the amount of time you spent on work or other activities?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes,2 - No'),
                          array('Text' => 'During the past 4 weeks as a result of any emotional problems have you accomplished less than you would like?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes,2 - No'),
                          array('Text' => 'During the past 4 weeks as a result of any emotional problems have you not done any work or other activities as carefully as usual?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Yes,2 - No'),
                          array('Text' => 'During the past 4 weeks to what extent has your physical health or emotional problems interfered with your normal social activities with family, friends, neighbors, or groups?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Not at all,2 - Slightly,3 - Moderately,4 - Quite a bit,5 - Extremely'),
                          array('Text' => 'How much bodily pain have you had during the past 4 weeks?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - None,2 - Very mild,3 - Mild,4 - Moderate,5 - Severe,6 - Very severe'),
                          array('Text' => 'During the past 4 weeks how much did pain interfere with your normal work(both inside and outside the home)?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Not at all,2 -  A little bit,3 - Moderately,4 - Quite a bit,5 - Extremely'),
                          array('Text' => 'How much of the time during the past 4 weeks have you feel full of pep?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'How much of the time during the past 4 weeks have you felt very nervous?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'How much of the time during the past 4 weeks have you felt so down that nothing could cheer you up?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'How much of the time during the past 4 weeks have you felt calm and peaceful?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'How much of the time during the past 4 weeks have you had a lot of energy?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'How much of the time during the past 4 weeks have you felt downhearted and blue?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'How much of the time during the past 4 weeks have you felt worn out?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'How much of the time during the past 4 weeks have you been a happy person?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'How much of the time during the past 4 weeks have you felt tired?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - A Good Bit of the Time,4 - Some of the Time,5 - A Little of the Time,6 - None of the Time'),
                          array('Text' => 'During the past 4 weeks how much of the time has your physical health or emotional problems interfered with your social activities(such as visiting friends, relatives, etc)?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - All of the Time,2 - Most of the Time,3 - Some of the Time,4 - A little of the Time,5 - None of the Time'),
                          array('Text' => 'How true or false is the following statement: I seem to get sick a little easier than other people?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Definitely True,2 - Mostly True,3 - Do Not Know,4 - Mostly False,5 - Definitely False'),
                          array('Text' => 'How true or false is the following statement: I am as healthy as anybody I know?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Definitely True,2 - Mostly True,3 - Do Not Know,4 - Mostly False,5 - Definitely False'),
                          array('Text' => 'How true or false is the following statement: I expect my health to get worse?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Definitely True,2 - Mostly True,3 - Do Not Know,4 - Mostly False,5 - Definitely False'),
                          array('Text' => 'How true or false is the following statement: My health is excellent?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '1 - Definitely True,2 - Mostly True,3 - Do Not Know,4 - Mostly False,5 - Definitely False'),
                       );

        $IBDCquestions = array(array('Text' => 'Do you believe that your IBD has been well controlled over the past 2 weeks?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'Do you believe that your current treatment is useful in controlling your IBD?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'Over the past 2 weeks have your bowel symptoms been getting worse, getting better, or not changed?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Better,No change,Worse'),
                          array('Text' => 'Over the past 2 weeks have you missed any planned actives because of IBD?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'Over the past 2 weeks have you been woken up at night due to symptoms of IBD?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'Over the past 2 weeks have you suffered from any significant pain or discomfort?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'Over the past 2 weeks have you often felt lacking in energy?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'Over the past 2 weeks have you felt anxious or depressed because of your IBB?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'Over the past 2 weeks have you thought that you needed a change to your treatment?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'At your next clinic visit would you like to discuss alternative types of drugs for controlling your IBD?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'At your next clinic visit would you like to discuss ways to adjust your own treatment?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'At your next clinic visit would you like to discuss side effects or difficulties with using your medications?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'At your next clinic visit would you like to discuss new symptoms that have developed since your last visit?'
                                     , 'Type' => 'RadioButtons' , 'PossibleResponses' => 'Yes,No,Not sure'),
                          array('Text' => 'Over the past 2 weeks how would you rate the OVERALL control of your IBD?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Worst Possible Control,1,2,3,4,5 - Neither agree or disagree,6,7,8,9,10 - Best Possible Control'),
                        );

        $HBquestions = array(array('Text' => 'Indicate Nisit No.'
                                    , 'Type' => 'DropDown' , 'PossibleResponses' => 'One,Two,Three'),
                          array('Text' => 'Rate the general well-being of the patient?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - Very well,1 - Slightly below par,2 - Poor,3 - Very poor,4 - Terrible'),
                          array('Text' => 'How would the patient rate their abdominal pain?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - None,1 - Mild,2 - Moderate,3 - Severe'),
                          array('Text' => 'How many liquid stool do they experience per day?'
                                     , 'Type' => 'FreeText' , 'PossibleResponses' => ''),
                          array('Text' => 'Indicate whether there is an abdominal mass present?'
                                     , 'Type' => 'DropDown' , 'PossibleResponses' => '0 - None,1 - Dubious,2 - Definite,3 - Definite and Tender'),
                          array('Text' => 'Select any of the below complications that apply(Score 1 per item)?'
                                     , 'Type' => 'CheckBox' , 'PossibleResponses' => 'Arthralgian,Uveitis,Erythema,Nodosum,Apthous Ulcers,Pyoderma Ganrenosm,Anal Fissure,New Fistula,Abscess'),
                          array('Text' => 'Total Score'
                                     , 'Type' => 'FreeText' , 'PossibleResponses' => ''),
                        );

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'GNOSH IBD Disc Survey',
            'ConditionServed' => 'IBD',
            'SurveyType' => 'PROM',
            'SurveyQuestions' => json_encode($GNOSHquestions)
        ]);

        //Commented waiting on reply from Angela for proper scales.
        //DB::table('SURVEY_QUESTIONS')->insert([
        //    'SurveyName' => 'Quality of Life in IBD Survey',
        //    'ConditionServed' => 'IBD',
        //    'SurveyType' => 'PROM',
        //    'SurveyQuestions' => json_encode($QOLquestions)
        //]);

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'Generalized Anxiety Survey',
            'ConditionServed' => 'IBD',
            'SurveyType' => 'PROM',
            'SurveyQuestions' => json_encode($GADquestions)
        ]);

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'Medical Outcomes Study Questionnaire',
            'ConditionServed' => 'IBD',
            'SurveyType' => 'PROM',
            'SurveyQuestions' => json_encode($MOSQquestions)
        ]);

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'IBD Control Questionnaire',
            'ConditionServed' => 'IBD',
            'SurveyType' => 'PROM',
            'SurveyQuestions' => json_encode($IBDCquestions)
        ]);

        DB::table('SURVEY_QUESTIONS')->insert([
            'SurveyName' => 'Harvey Bradshaw Index Questionnaire (Physician)',
            'ConditionServed' => 'Admin',
            'SurveyType' => 'PROM',
            'SurveyQuestions' => json_encode($HBquestions)
        ]);
    }
}
