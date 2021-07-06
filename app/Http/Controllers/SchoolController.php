<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\Http\Requests\SchoolRequest;
use App\SchoolProfile;
use App\TeacherProfile;
use App\Program;
use App\SchoolReview;
use App\Branch;
use Auth;

class SchoolController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
     $this->middleware('auth',['except' => 'index']);
    }

    public function index()
    {
     $schools = SchoolProfile::latest()->paginate(9);
     return view ('frontend.pages.school.index', compact('schools'));
    }

    public function create()
    {
    return view ('frontend.pages.school.create');
    }

    public function store(SchoolRequest $request){
   
    $validated = $request->validated();
    
    $profile = new SchoolProfile();
    $profile->name = $request->name;
    $profile->email = $request->email;
    $profile->address = $request->address;
    $profile->location = $request->location;
    $profile->user_id = $request->user_id;
    $profile->subject = $request->subject;
    $profile->experience = $request->experience;
    $profile->phone = $request->phone;
    $profile->about = $request->about;
    $profile->price = $request->price;
    $profile->work_day = $request->work_day;
    $profile->from = $request->from;
    $profile->to = $request->to;
    $profile->onlineTraining = $request->onlineTraining;
    $profile->instagram = $request->instagram;
    $profile->vk = $request->vk;
    $profile->website = $request->website;
    $profile->skype = $request->skype;
    $profile->slug = Str::slug($request->name).'_'.time();
    $image = $request->pic;
    $name = Str::slug($request->name).'_'.time();
    $folder = '/uploads/images/';
    $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();

    $this->uploadOne($image, $folder, 'public', $name);

    $profile->pic = $filePath;

    $profile->save();

    return redirect('/schools')->with(['status' => 'Профиль успешно создан.']);

    }

    public function show($slug)
    {

     $reviews = SchoolReview::where('slug', $slug)->get();
     $school = SchoolProfile::where('slug', $slug)->first();
     $school_user_id = $school->user_id;
     $programs = Program::where('user_id', $school_user_id)->latest()->get();
     $branches = Branch::where('school_profile_id', $school->id)->latest()->get();
     $schools = SchoolProfile::latest()->where('location', $school->location)
                                 ->where('slug' ,'!=', $school->slug)
                                 ->take(5)
                                 ->get();
     return view ('frontend.pages.school.show', compact('school','reviews','programs','branches','schools'));

     }

      /**
      * Show the form for editing the specified resource.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
      public function edit($id)
      {
         $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
         return view ('frontend.pages.school.edit', compact('school'));
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
      'pic' => 'mimes:jpeg,png,jpg | max:2048',
      'price' => 'required',
      'about' => 'required',
      'work_day' => 'required',
      'website' => 'required_with:website, active_url',
      'onlineTraining' => 'required',
      'skype' => 'required_with:skype, active_url',
      'vk' => 'required_with:vk, active_url',
      'instagram' => 'required_with:instagram, active_url',
      ]);

      $profile = SchoolProfile::where('user_id', auth()->user()->id)->first();
      $profile->name = $request->name;
      $profile->email = $request->email;
      $profile->price = $request->price;
      $profile->location = $request->location;
      $profile->user_id = $request->user_id;
      $profile->subject = $request->subject;
      $profile->experience = $request->experience;
      $profile->phone = $request->phone;
      $profile->about = $request->about;
      $profile->from = $request->from;
      $profile->to = $request->to;
      $profile->work_day = $request->work_day;
      $profile->onlineTraining = $request->onlineTraining;
      $profile->instagram = $request->instagram;
      $profile->vk = $request->vk;
      $profile->website = $request->website;
      $profile->skype = $request->skype;
     
      if($request->has('pic'))
      {
        $image = $request->pic;
        $name = Str::slug($request->name).'_'.time();
        $folder = '/uploads/images/';
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        $this->uploadOne($image, $folder, 'public', $name);
        $profile->pic = $filePath;
      }

      $profile->save();

      return redirect('/schools')->with(['status' => 'профиль успешно обновлен.']);

      }


      public function schools()
      {
          $schools = SchoolProfile::latest()->paginate(10);
          return view('admin.pages.school.index', compact('schools'));
      }

      public function destroy($id)
      {
        $profile = SchoolProfile::where('id', $id)->first();
        $profile->delete();
        return redirect()->route('schools.admin')->with(['status' => 'school profile delete successfully']);
      }

}
