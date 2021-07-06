<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolProfile;
use App\TeacherProfile;
use App\StudentPost;
use App\Contact;
use Auth;
use Mail;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
     public function contact(){
         
     return view('frontend.pages.contact');
     }

     public function saveContact(ContactRequest $request){

     $validated = $request->validated();
    
     $contact = new Contact();

     $contact->name = $request->name;
     $contact->email = $request->email;
     $contact->message = $request->message;

     $contact->save();

     
    return back()->with('status', 'Сообщение успешно отправлено');

    }

}
