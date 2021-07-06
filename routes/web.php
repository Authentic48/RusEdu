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

Route::get('/', 'PagesController@index')->name('landing');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::post('/contact', 'ContactController@saveContact')->name('contact.save');
Route::get('/teachers', 'TeacherProfileController@index')->name('teachers');
Route::get('/schools', 'SchoolController@index')->name('schools');
Route::get('/students', 'StudentController@index')->name('students');
Route::get('/jobs', 'JobController@index')->name('jobs');
Route::post('/search', 'SearchController@filter')->name('search');
Route::post('/schools', 'SearchController@school')->name('search.school');
Route::post('/jobs', 'SearchController@job')->name('search.job');
Route::post('/teachers', 'SearchController@teacher')->name('search.teacher');
Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.store');

Route::get('/for-teachers', 'PagesController@teachers')->name('for_teachers');
Route::get('/for-schools', 'PagesController@schools')->name('for_schools');
Route::get('/for-guests', 'PagesController@guests')->name('for_guests');
Route::get('/for-job-seekers', 'PagesController@jobs')->name('for_jobs');
Route::get('/terms', 'PagesController@terms')->name('terms');
Route::get('/privacy', 'PagesController@privacy')->name('privacy');
Route::get('/support', 'PagesController@support')->name('support');
Route::get('/how', 'PagesController@how')->name('how');


Auth::routes(['verify' => true]);

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/verify/email', 'HomeController@verify')->name('verify.user');
Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
Route::get('/teachers/{slug}', 'TeacherProfileController@show')->name('teachers.show');
Route::get('/schools/{slug}', 'SchoolController@show')->name('schools.show');
Route::get('/students/{slug}', 'StudentController@show')->name('students.show');
Route::get('/jobs/{slug}', 'JobController@show')->name('jobs.show');
Route::post('/comment', 'CommentController@store')->name('comment.store');
Route::get('/invitations', 'InvitationController@index')->name('invitations');
Route::get('/invitations/reply', 'InvitationController@reply')->name('invitation.reply');
Route::post('/invitations/replies', 'InvitationController@save')->name('invitation.save');
Route::get('/invitations/{id}', 'InvitationController@show')->name('invitations.show');
Route::get('/support-or-feedbacks/create', 'HomeController@supportCreate')->name('support.create');
Route::post('/support-or-feedbacks', 'HomeController@supportSave')->name('support.store');



Route::group(['prefix' => 'school', ['middleware' => ['school','admin','verified']]], function(){

      Route::get('/', 'SchoolController@index')->name('school');
      Route::get('/p/create', 'SchoolController@create')->name('school.profile');
      Route::post('/p', 'SchoolController@store')->name('school.store');
      Route::get('/p/{id}/edit', 'SchoolController@edit')->name('school.edit');
      Route::patch('/p/{id}', 'SchoolController@update')->name('school.update');
      Route::get('/job/create', 'JobController@create')->name('job.create');
      Route::post('/job', 'JobController@store')->name('job.store');
      Route::get('/myjobs', 'JobController@myjobposts')->name('job.post');
      Route::get('/job/{id}/edit','JobController@edit')->name('job.edit');
      Route::patch('/job/{id}','JobController@update')->name('job.update');
      Route::delete('/job/{id}', 'JobController@destroy')->name('job.delete');
      Route::get('/programs/create', 'ProgramController@create')->name('program.create');
      Route::post('/programs', 'ProgramController@store')->name('program.store');
      Route::get('/our-programs', 'ProgramController@index')->name('program.index');
      Route::get('/{id}/applicants', 'ApplicationController@show')->name('applicants.show');
      Route::get('/application/{id}/edit', 'ApplicationController@edit')->name('application.edit');
      Route::patch('/application/{id}', 'ApplicationController@update')->name('application.update');
      Route::get('/program/{id}/edit', 'ProgramController@edit')->name('program.edit');
      Route::patch('/our-programs/{id}', 'ProgramController@update')->name('program.update');
      Route::delete('/program/{id}', 'ProgramController@destroy')->name('program.delete');
      Route::get('/download/{id}','ApplicationController@download')->name('download.resume');
      Route::get('/invitations/create', 'InvitationController@create')->name('invitation.create');
      Route::post('/invitations', 'InvitationController@store')->name('invitation.store');
      Route::get('/branches/create', 'BrancheController@create')->name('branche.create');
      Route::post('/branches', 'BrancheController@store')->name('branche.store');
      Route::get('/branches/{id}/edit', 'BrancheController@edit')->name('branche.edit');
      Route::patch('/branches/{id}/', 'BrancheController@update')->name('branche.update');
      Route::delete('/branches/{id}', 'BrancheController@destroy')->name('branche.delete');


});


Route::group(['prefix' => 'student', ['middleware' => ['student','admin','verified']]], function(){
        
      Route::get('/','StudentController@index')->name('student');
      Route::get('/myposts','StudentController@mypost')->name('student.post');
      Route::get('/post/create','StudentController@create')->name('student.create');
      Route::post('/post','StudentController@store')->name('student.store');
      Route::get('/post/{id}/edit','StudentController@edit')->name('student.edit');
      Route::patch('/post/{id}','StudentController@update')->name('student.update');
      Route::delete('/post/{id}', 'StudentController@destroy')->name('student.delete');
      Route::get('/{id}/reviews','SchoolReviewController@create')->name('review.create');
      Route::post('{id}/reviews','SchoolReviewController@store')->name('review.store');
      Route::get('teacher/{id}/reviews','SchoolReviewController@createTeacher')->name('review.teacher');
      Route::post('teacher/{id}/reviews','SchoolReviewController@storeTeacher')->name('review.teacherStore'); 
     
});


Route::group(['prefix' => 'teacher', ['middleware' => ['teacher','admin','verified']]], function(){

     Route::get('/','TeacherProfileController@index')->name('teacher');
     Route::get('/p/create', 'TeacherProfileController@create')->name('teacher.profile');
     Route::post('/p', 'TeacherProfileController@store')->name('teacher.store');
     Route::get('/p/{id}/edit', 'TeacherProfileController@edit')->name('teacher.edit');
     Route::patch('/p/{id}', 'TeacherProfileController@update')->name('teacher.update');
     Route::get('{id}/application', 'ApplicationController@create')->name('application');
     Route::post('{id}/application', 'ApplicationController@store')->name('application.store');
     Route::get('my-application', 'ApplicationController@index')->name('myapplication');  
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

      Route::get('/','HomeController@index')->name('admin');
      Route::get('/users', 'UserController@index')->name('users');
      Route::get('/users/create', 'UserController@create')->name('users.create');
      Route::post('/user', 'UserController@store')->name('users.store');
      Route::delete('/users/{id}', 'UserController@destroy')->name('users.delete');
      Route::get('/users/profile/{id}/edit', 'UserController@edit')->name('users.edit');
      Route::patch('/users/profile/{id}', 'UserController@update')->name('users.update');
      Route::get('/profile/{id}/edit', 'UserController@profile')->name('profile.edit');
      Route::patch('/profile/{id}', 'UserController@updateProfile')->name('Userprofile.update');
      Route::get('/schools','SchoolController@schools')->name('schools.admin');
      Route::get('/teachers','TeacherProfileController@teachers')->name('teachers.admin');
      Route::get('/pages', 'ManagePageController@index')->name('pages');
      Route::get('/pages/create', 'ManagePageController@create')->name('pages.create');
      Route::post('/pages', 'ManagePageController@store')->name('pages.store');
      Route::get('/pages/{id}/edit', 'ManagePageController@edit')->name('pages.edit');
      Route::patch('/pages/{id}', 'ManagePageController@update')->name('pages.update');
      Route::delete('/pages/{id}', 'ManagePageController@destroy')->name('pages.delete');
      Route::get('user/support', 'HomeController@support')->name('support.admin');
      Route::get('user/support/{id}', 'HomeController@supportShow')->name('support.show');
      Route::get('messages', 'HomeController@messages')->name('messages');
      Route::get('messages/{id}', 'HomeController@message')->name('message'); 
});
