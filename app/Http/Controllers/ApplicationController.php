<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\SchoolProfile;
use App\Job;
use App\TeacherProfile;
use App\Http\Requests\ApplicationRequest;
use Auth;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
     $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $applications = Application::where('teacher_id', Auth::user()->id)->latest()->get();
        $teacher = TeacherProfile::where('user_id', auth()->user()->id)->first();
        return view('frontend.pages.application.index', compact('applications','teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $job = Job::where('id', $id)->first();
        $school_id = $job->user_id;
        $school = SchoolProfile::where('user_id', $school_id)->first();
        $teacher = TeacherProfile::where('user_id', auth()->user()->id)->first();
        return view('frontend.pages.application.create', compact('teacher', 'job', 'school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
         $validated = $request->validated();

         $application = new Application();

         $application->job_title = $request->job_title;
         $application->school_name = $request->school_name;
         $application->name = $request->name;
         $application->email = $request->email;
         $application->user_id = $request->user_id;
         $application->teacher_id = $request->teacher_id;
         $application->job_id = $request->job_id;
         $application->status = $request->status;

         $pdf = $request->file('resume');

         $name = Str::slug($request->input('name')).'_'.time();

         $folder = '/uploads/resume/';

         $filePath = $folder . $name. '.' . $pdf->getClientOriginalExtension();

         $this->uploadOne($pdf, $folder, 'public', $name);

         $application->resume = $filePath;
         
         $application->save();

         return redirect('/jobs')->with(['status' => 'Заявка на работу успешно отправлена.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::where('id', $id)->first();
        $job_id = $job->id;
        $applications = Application::where('job_id', $job_id)->get();
        $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
        return view('frontend.pages.application.show', compact('applications','school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::where('id', $id)->first();
        $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
        return view('frontend.pages.application.edit', compact('application','school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([

        'status' => 'required',
        'comments' => 'required_with:comments',
       
        ]);

        $application = Application::where('id', $id)->first();

        $application->status = $request->status;
        $application->comments = $request->comments;

        $application->save();

        return redirect('school/myjobs')->with(['status' => 'Обновление приложения успешно.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function  download($id) {

    $application = Application::where('id', $id)->first();

    return Storage::disk('public')->download($application->resume, $application->name);

    }
}
