<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeacherProfile;
use App\SchoolProfile;
use App\Http\Requests\SearchRequest;
use App\Job;
use Auth;


class SearchController extends Controller
{
    public function filter(SearchRequest $request)
    {
      $validated = $request->validated();

      $subject = $request->subject;
      $location = $request->location;
      $role = $request->role;
      $teacher1 = "teacher";
      $school1 = "school";
      $job = "job";
      
      if (strcmp($role, $teacher1) == 0)
      {
         $teachers = TeacherProfile::where('subject', 'LIKE','%'.$subject.'%')
                                     ->where('location', 'LIKE','%'.$location.'%')
                                     ->paginate(9);

         return view('frontend.pages.search.teacher', compact('teachers'));
      }

      if (strcmp($role, $school1) == 0)
      {
          $schools = SchoolProfile::where('subject', 'LIKE','%'.$subject.'%')
                                    ->where('location', 'LIKE','%'.$location.'%')
                                    ->paginate(9);

        return view('frontend.pages.search.school', compact('schools'));
      }

      if (strcmp($role, $job) == 0)
      {
      $jobs = Job::where('title', 'LIKE','%'.$subject.'%')
                        ->where('city', 'LIKE','%'.$location.'%')
                        ->paginate(9);
      return view('frontend.pages.search.job', compact('jobs'));
      }


    }


    public function school(SearchRequest $request)
    {
      $validated = $request->validated();
      $subject = $request->subject;
      $location = $request->location;
      $schools = SchoolProfile::where('subject', 'LIKE','%'.$subject.'%')
                                ->where('location', 'LIKE','%'.$location.'%')
                                ->paginate(9);

      return view('frontend.pages.school.index', compact('schools'));
     }

     public function job(SearchRequest $request)
     {
      $validated = $request->validated();
      $subject = $request->subject;
      $location = $request->location;

      $jobs = Job::where('title', 'LIKE','%'.$subject.'%')
                                ->where('city', 'LIKE','%'.$location.'%')
                                ->paginate(9); 
      return view('frontend.pages.school.job.index', compact('jobs'));
      }

     public function teacher(SearchRequest $request)
     {

      $validated = $request->validated();
      $subject = $request->subject;
      $location = $request->location;
      $teachers = TeacherProfile::where('subject', 'LIKE','%'.$subject.'%')
                                ->where('location', 'LIKE','%'.$location.'%')
                                ->paginate(9);
      return view('frontend.pages.teacher.index', compact('teachers'));

     }
    
}
