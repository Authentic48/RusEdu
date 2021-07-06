<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support;
use App\Contact;
use App\User;
use App\SchoolProfile;
use App\TeacherProfile;



class HomeController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth']);
    }
    
    public function index()
    {
      $users = User::all();
      $teachers = TeacherProfile::all();
      $schools = SchoolProfile::all();
      $guests = $users->count() - ($teachers->count() + $schools->count()); 
      $supports = Support::latest()->get();
      $messages = Contact::latest()->get();
     // dd($guests);
      return view('admin.pages.index', compact('users','schools','teachers','guests','supports','messages'));
    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function support()
    {
        $supports = Support::latest()->get();
        //dd($supports->All());
        return view('admin.pages.support.index', compact('supports'));
    }

    public function supportCreate()
    {
        return view('admin.pages.support.create');
    }

    public function supportShow($id)
    {
        $support = Support::where('id', $id)->first();
        return view('admin.pages.support.show', compact('support'));
    }

    public function supportSave(Request $request)
    {
        $messages = [
            'required' => 'Это поле обязательно к заполнению',
        ];
        $validated =  $request->validate([
            'content' => 'required',
        ], $messages);   

        $support = new Support();
        $support->name = $request->name;
        $support->email = $request->email;
        $support->content = $request->content;
        $support->save();
        return redirect('/support')->with(['status' => 'отправить успешно.']);
    }

    public function messages()
    {
        $messages = Contact::latest()->get();
        return view('admin.pages.message.index', compact('messages'));
    }

    public function message($id)
    {
        $message = Contact::where('id', $id)->first();
        return view('admin.pages.message.show', compact('message'));
    }

}
