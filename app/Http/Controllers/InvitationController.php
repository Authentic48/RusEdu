<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use App\TeacherProfile;
use App\SchoolProfile;
use Auth;
use App\Http\Requests\InvitationRequest;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher =TeacherProfile::where('user_id', Auth::user()->id)->first();
        $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
        $invitations = Invitation::where('to', Auth::user()->email)->latest()->get();
        $replies = Invitation::where('from', Auth::user()->email)->latest()->get();
        return view('frontend.pages.invitation.index', compact('school','teacher','invitations','replies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
        $teacher = TeacherProfile::where('user_id', Auth::user()->id)->first();
        return view('frontend.pages.invitation.create',compact('school','teacher'));
    }

     /**
     * Show the form for creating a new reply.
     *
     * @return \Illuminate\Http\Response
     */

    public function reply(){

         $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
         $teacher = TeacherProfile::where('user_id', Auth::user()->id)->first();
         return view('frontend.pages.invitation.reply',compact('school','teacher'));
    }

     /**
      * Store a newly created resource in save an reply.
      *
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\Response
      */
      public function save(InvitationRequest $request)
      {
      $validated = $request->validated();

      $invitation = new Invitation();

      $invitation->from = Auth::user()->email;
      $invitation->to = $request->to;
      $invitation->subject = $request->subject;
      $invitation->message = $request->message;

      $invitation->save();


      return redirect('/invitations')->with('status', 'Ответить успешно отправлено');
      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitationRequest $request)
    {
        $validated = $request->validated();
        $invitation = new Invitation();

        $invitation->from = Auth::user()->email;
        $invitation->to = $request->to;
        $invitation->subject = $request->subject;
        $invitation->message = $request->message;
        $invitation->save();


        return redirect('/invitations')->with('status', 'приглашение успешно отправлено');
    }


    public function show($id)
    {
        $message = Invitation::where('id', $id)->first();
        return view('frontend.pages.invitation.show', compact('message'));
    }

   
}
