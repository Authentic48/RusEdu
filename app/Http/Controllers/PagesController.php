<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolProfile;
use App\TeacherProfile;
use App\StudentPost;
use App\Contact;
use Auth;
use Mail;
use App\Job;
use App\Http\Requests\ContactRequest;
use App\Page;

class PagesController extends Controller
{

  
    public function index()
    {
      $schools = SchoolProfile::latest()->paginate(3);
      $teachers = TeacherProfile::latest()->paginate(3);
      $posts = StudentPost::latest()->paginate(3);
      $page = Page::where('name', 'landing')->first();
      $jobs = Job::latest()->paginate(3);
      $teachersCount = TeacherProfile::all();
      $schoolsCount = SchoolProfile::all();
      $jobsCount = Job::all();
      return view('frontend.pages.index', compact('schools','teachers','posts','jobs','page','jobsCount','teachersCount','schoolsCount'));
    }

    public function about()
    {
      $page = Page::where('name', 'about')->first();
      //dd($page);
      return view('frontend.pages.about', compact('page'));
    }

    public function teachers()
    {
      $page = Page::where('name', 'teacher')->first();
      return view('frontend.pages.for_teachers', compact('page'));
    }

    public function schools()
    {
      $page = Page::where('name', 'school')->first();
      return view('frontend.pages.for_schools', compact('page'));
    }

    public function guests()
    {
      $page = Page::where('name', 'guest')->first();
      return view('frontend.pages.for_students', compact('page'));
    }

    public function jobs()
    {
      $page = Page::where('name', 'job')->first();
      return view('frontend.pages.for_job_seekers', compact('page'));
    }

    public function terms()
    {
      $page = Page::where('name', 'terms')->first();
      return view('frontend.pages.terms', compact('page'));
    }

    public function privacy()
    {
      $page = Page::where('name', 'privacy')->first();
      return view('frontend.pages.privacy', compact('page'));
    }

    public function support()
    {
      $page = Page::where('name', 'support')->first();
      return view('frontend.pages.support', compact('page'));
    }

    public function how()
    {
      $page = Page::where('name', 'how')->first();
      return view('frontend.pages.how', compact('page'));
    }

}
