<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolProfile;
use App\Job;
use App\TeacherProfile;
use App\Http\Requests\JobRequest;
use Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
     public function __construct()
     {
     $this->middleware('auth',['except' => 'index']);
     }

     
     public function index(){
     
        $jobs = Job::latest()->paginate(9);
        if(Auth::check())
        {
        $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
        $teacher = TeacherProfile::where('user_id', auth()->user()->id)->first();
        return view('frontend.pages.school.job.index', compact('school','jobs','teacher'));
        }
      return view('frontend.pages.school.job.index', compact('jobs'));
      
     }

      public function create(){
      
          $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
          return view('frontend.pages.school.job.create', compact('school'));   
      }

      public function store(JobRequest $request){

         $validated = $request->validated();

         $job = new Job();
         $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
         $job->photo = $school->pic;
         $job->title = $request->title;
         $job->email = $request->email;
         $job->user_id = $request->user_id;
         $job->profession = $request->profession;
         $job->city = $request->city;
         $job->experience = $request->experience;
         $job->about = $request->about;
         $job->description = $request->description;
         $job->requirements = $request->requirements;
         $job->address = $request->address;
         $job->salary = $request->salary;
         $job->deadline = $request->deadline;
         $job->application = $request->application;
         $job->name = $request->name;
         $job->slug = Str::slug($request->title).'_'.time();

         $job->save();


         return redirect('/jobs')->with(['status' => 'работа создана успешно.']);
         
      }

      public function show($slug){

       $job = Job::where('slug', $slug)->first();
       $jobs = Job::latest()->where('id','!=', $job->id)->take(5)->get();
       return view('frontend.pages.school.job.show', compact('job','jobs'));

      }

      public function myjobposts(){

          $jobs = Job::where('user_id', auth()->user()->id)->latest()->get();
          $school = $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
          return view('frontend.pages.school.job.posts', compact('jobs', 'school'));
      }


      /**
      * Show the form for editing the specified resource.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
      public function edit($id)
      {
        $job = Job::where('id', $id)->first();
        $school = $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
        return view('frontend.pages.school.job.edit', compact('job', 'school'));
      }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, $id)
    {
        $validated =  $request->validate([
         'title' => 'required | max:50',
         'email' => ['required',],
         'user_id' => 'required',
         'city' => 'required',
         'profession' => 'required',
         'experience' => 'required',
         'salary' => 'required',
         'about' => 'required',
         'deadline' => 'required | date',
         'application' => 'required',
         'description' => 'required',
         'requirements' => 'required',
         'address' => 'required',
         'name' => 'required',
        ]);


        $school = SchoolProfile::where('user_id', auth()->user()->id)->first();

        $validated['photo'] = $school->pic;
        
        $job = Job::where('id', $id)->first();

        $job->update($validated);

        return redirect('/jobs')->with(['status' => 'работа успешно обновлена.']);

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {

    $job = Job::where('id', $id)->first();

    $job->delete();

    return redirect('/jobs')->with(['status' => 'работа успешно удалена']);

    }
}
