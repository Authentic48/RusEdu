<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\TeacherProfileRequest;
use App\TeacherProfile;
use App\SchoolProfile;
use App\Traits\UploadTrait;
use App\SchoolReview;

use Auth;

class TeacherProfileController extends Controller
{
     use UploadTrait;

     public function __construct()
     {
     $this->middleware('auth',['except' => 'index']);
     }

     public function index()
     {
      $teachers = TeacherProfile::latest()->paginate(9);
      if(Auth::check()){
       $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
       return view ('frontend.pages.teacher.index', compact('teachers','school'));
      }
      return view ('frontend.pages.teacher.index', compact('teachers'));
     }

     public function create()
     {
       return view ('frontend.pages.teacher.create');
     }

     public function store(TeacherProfileRequest $request){

       $validated = $request->validated();
       $profile = new TeacherProfile();
       $profile->name = $request->name;
       $profile->email = $request->email;
       $profile->citizenship = $request->citizenship;
       $profile->location = $request->location;
       $profile->user_id = $request->user_id;
       $profile->subject = $request->subject;
       $profile->experience = $request->experience;
       $profile->phone = $request->phone;
       $profile->about = $request->about;
       $profile->wages = $request->wages;
       $profile->work_day = $request->work_day;
       $profile->from = $request->from;
       $profile->to = $request->to;
       $profile->onlineTraining = $request->onlineTraining;
       $profile->instagram = $request->instagram;
       $profile->vk = $request->vk;
       $profile->skype = $request->skype;
       $profile->slug = Str::slug($request->name).'_'.time();
       $image = $request->pic;
       $name = Str::slug($request->name).'_'.time();
       $folder = '/uploads/images/';
       $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();

       $this->uploadOne($image, $folder, 'public', $name);

       $profile->pic = $filePath;

       $profile->save();
       
       return redirect('/teachers')->with(['status' => 'Профиль успешно создан..']);
      
     }

      public function show($slug)
      {
      $teacher = TeacherProfile::where('slug', $slug)->first();
      $reviews = SchoolReview::where('slug', $slug)->get();
      $teachers = TeacherProfile::latest()->where('location', $teacher->location)
                                 ->where('slug' ,'!=', $teacher->slug)
                                 ->take(5)
                                 ->get();
      return view ('frontend.pages.teacher.show', compact('teacher','teachers','reviews'));
      }


       /**
       * Show the form for editing the specified resource.
       *
       * @param int $id
       * @return \Illuminate\Http\Response
       */
       public function edit($id)
       {
          $teacher = TeacherProfile::where('user_id', auth()->user()->id)->first();
          return view ('frontend.pages.teacher.edit', compact('teacher'));
       }

       public function update(Request $request, $id){

       $request->validate([
       'name' => 'required | max:50',
       'email' => ['required',],
       'user_id' => 'required',
       'location' => 'required',
       'subject' => 'required',
       'experience' => 'required',
       'phone' => 'required',
       'pic' => 'image| mimes:jpeg,png,jpg | max:2048',
       'wages' => 'required',
       'about' => 'required',
       'work_day' => 'required',
       'from' => 'required',
       'to' => 'required',
       'citizenship' => 'required',
       'onlineTraining' => 'required',
       'skype' => 'required_with:skype, active_url',
       'vk' => 'required_with:vk, active_url',
       'instagram' => 'required_with:instagram, active_url',
       ]);

       $profile = TeacherProfile::where('user_id', auth()->user()->id)->first();

       $profile->name = $request->name;
       $profile->email = $request->email;
       $profile->citizenship = $request->citizenship;
       $profile->location = $request->location;
       $profile->user_id = $request->user_id;
       $profile->subject = $request->subject;
       $profile->experience = $request->experience;
       $profile->phone = $request->phone;
       $profile->about = $request->about;
       $profile->wages = $request->wages;
       $profile->work_day = $request->work_day;
       $profile->from = $request->from;
       $profile->to = $request->to;
       $profile->onlineTraining = $request->onlineTraining;
       $profile->instagram = $request->instagram;
       $profile->vk = $request->vk;
       $profile->skype = $request->skype;
        
       if($request->has('image'))
       {
        $image = $request->pic;
        $name = Str::slug($request->name).'_'.time();
        $folder = '/uploads/images/';
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        $this->uploadOne($image, $folder, 'public', $name);
        $profile->pic = $filePath; 
       }
       
       $profile->save();
       
       return redirect('/teachers')->with(['status' => 'профиль успешно обновлен.']);

      }

      public function teachers()
      {
        $teachers = TeacherProfile::latest()->paginate(10);
        return view('admin.pages.teacher.index', compact('teachers'));
      }

      public function destroy($id)
      {
        $profile = TeacherProfile::where('id', $id)->first();

        $profile->delete();

        return redirect()->route('teachers.admin')->with(['status' => 'teacher  profile delete successfully.']);
      }

}
