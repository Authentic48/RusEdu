<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\TeacherProfile;
use App\SchoolProfile;

class ProfileController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index(){
        $teacher = TeacherProfile::where('user_id', auth()->user()->id)->first();
        $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
        return view('home',compact('teacher','school'));
    }

    public function update(Request $request)
    {
    $request->validate([
    'name' => 'required',
    'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    'email' =>'required'
    ]);

   
    $user = User::findOrFail(auth()->user()->id);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    if ($request->has('profile_image')) {
  
    $image = $request->file('profile_image');
   
    $name = Str::slug($request->input('name')).'_'.time();
  
    $folder = '/uploads/images/';
   
    $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
  
    $this->uploadOne($image, $folder, 'public', $name);
  
    $user->profile_image = $filePath;
    }

    $user->save();

    return redirect()->back()->with(['status' => 'Профиль успешно обновлен.']);
    }
}


