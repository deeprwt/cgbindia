<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
// Route::get('reg','mainController@getState'); 
// Route::get('reg', function(){
//     return view('registration.school');
// });

// ===========================================ADMIN =======================================================
// Route::get('reg','mainController@getState');
Route::get('admin/login',function(){
    return view('auth.login');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('dashboard',function(){
        return view('admin.pages.dashboard');
    });
});

Route::post('admin-login','authController@login')->name('admin.login');

// -------------------------------------------------- website -------------------------------------------------
Route::get('/', function(){
    return view('web.index');
   //return view('student.pages.spr');
});
Route::get('/about-isfo',function(){
    return view('web.aboutisfo');
});
Route::get('advisory-council',function(){
    return view('web.advisory');
});
Route::get('why-isfo',function(){
        return view('web.why-isfo');
});
Route::get('our-partner',function(){
    return view('web.partner');
});
Route::get('science',function(){
    return view('web.olympaid.science');
});
Route::get('gk',function(){
    return view('web.olympaid.gk');
});
Route::get('english',function(){
    return view('web.olympaid.english');
});
Route::get('math',function(){
    return view('web.olympaid.math');
});

Route::get('sample-paper/science',function(){
    return view('web.olympaid.sp.science');
});
Route::get('sample-paper/gk',function(){
    return view('web.olympaid.sp.gk');
});
Route::get('sample-paper/english',function(){
    return view('web.olympaid.sp.english');
});
Route::get('sample-paper/math',function(){
    return view('web.olympaid.sp.math');
});

Route::get('scheme/science',function(){
    return view('web.olympaid.scheme.science');
});
Route::get('scheme/gk',function(){
    return view('web.olympaid.scheme.gk');
});
Route::get('scheme/english',function(){
    return view('web.olympaid.scheme.english');
});
Route::get('scheme/math',function(){
    return view('web.olympaid.scheme.math');
});

// -------------------------------------------------- cgb website new pages created solutions -------------------------------------------------

Route::get('solutions/outsystems',function(){
    return view('web.solutions.outsystems');
});
Route::get('solutions/automation',function(){
    return view('web.solutions.automation');
});
Route::get('solutions/oracle',function(){
    return view('web.solutions.oracle');
});
Route::get('solutions/automation',function(){
    return view('web.solutions.automation');
});

// -------------------------------------------------- cgb website new pages created solutions end -------------------------------------------------

Route::get('faq',function(){
    return view('web.faq');
});

Route::get('testimonials',function(){
    return view('web.testo');
});
Route::get('gallery',function(){
    return view('web.gallery');
});
Route::get('studentLogin',function(){
    return view('registration.studetn-login');
});
Route::get('student-forgot-password',function(){
    return view('registration.student-forgot-passswrd');
});

Route::get('awards-rec',function(){
    return view('web.award');
});
Route::get('online-process',function(){
    return view('web.online-process');
});
Route::get('contact',function(){
    return view('web.contact');
});
Route::post("verifySchoolCode",'StudentController@verifyschoolCode');
Route::get('login', function () {
    return view('web.login');
});
Route::get('school-login',function(){
    return view('registration.checkskool');
});
Route::post('getcity','mainController@getCity');
Route::resource('schoolMaster', SchoolMasterControler::class);

Route::get('logout','authController@logout')->name('logout');

Route::post('school-logins','authController@schoolLogin')->name('school.check');

Route::middleware('teacher')->prefix('school')->group(function () {
     Route::get('home',function(){
        return view('teacher.pages.home');
    });
    Route::get('add-student',function(){
        return view('teacher.pages.add-student');
    });
    Route::post('adding-students','TeacherController@AddStudents')->name('adding.studnet.teacher');
    Route::post('sendSchoolCode','TeacherController@RegisteredStudent');
});
Route::get('studnet-registration',function(){
    return view('registration.student-reg');
});
Route::post('stundent-login','StudentController@StudentLogin')->name('stundet.login');
 Route::post('checkSchoolInvatation','StudentController@CheckInvCode')->name('stundet.checkCode');


Route::middleware('student')->prefix('student')->group(function () {
    Route::get('home',function(){
        return view('student.pages.home');
    });
    Route::get('support',function(){
        return view('student.pages.support');
    });
    Route::get('live-test','livePaper@index');
    Route::get('practise-material','StudentController@ShowPractise'); 
    // Route::get('profile',function(){
    //     return view('student.pages.profile');
    // });
    Route::get('finalresult','sprContoller@getSubject');
    Route::get('showResult',function(){
        return view('student.pages.show-result');
    });
    Route::post('showresult','sprContoller@getResult');
Route::post('updatingPhone','StudentController@validatePhoneNumber');

    Route::get('all-subject','StudentController@AllSubject');
    Route::post('add-subject','StudentController@AddSubject');
    Route::get('practise-test','StudentController@showPractiseTest');
    Route::post('showPractiseQuestion','PractiseTestController@ShowTest');
    Route::post('practisepaper','PractiseTestController@validateUser');
    Route::post('showpractiseresult','PractiseTestController@showPractiseResult');
    Route::resource('practise-tests', PractiseTestController::class);
    Route::post('getTimeFromTestPaper','PractiseTestController@PractisePaperTime');
    Route::post('getpractisePaperRemainingTime','PractiseTestController@getPaperRemainingTime');
    Route::get('test','PractiseTestController@testQuestionOrder');
    Route::post('practise-result','PractiseTestController@getPractiseResult');
    Route::post('checkUser','PractiseTestController@testAttempt');
    Route::post('rightclickdisbled','CheatController@RightClick');
    Route::post('copydisbled','CheatController@Copy');
    Route::post('tabdisabled','CheatController@TabChange');
    Route::post('storeeachQuestion','userQuestionStoreController@store');
    // live
    Route::post('final-test','livePaper@finalQuestions');
    Route::post('checkuserdata','livePaper@ValidateStu');

    Route::get('test',function(){
        return view('student.pages.finalquestion');
    });
    Route::post('finalSubmit','livePaper@store');
    Route::post('getfinalPaperRemainingTime','livePaper@getPaperRemainingTime');
    Route::post('getFinalTime','livePaper@PractisePaperTime');
    Route::get('thankyou',function(){
        return view('student.pages.thankyou');
    });
    Route::post('support-store','supportController@store');
});

Route::post('verifyStudentPhone','authController@studentForgotPassowrd');
Route::post('create-new-pssowrd','authController@NewPassword');
//Route::get('stundentRegistration','StudentController@StundetRegistation')->name('student.registration-1');
Route::post('stundentRegistration','StudentController@StundetRegistation')->name('student.registration-1');
Route::resource('isfoContact', ISFOContactController::class);




