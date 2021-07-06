<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolProfile;
use App\SchoolReview;
use App\User;
use Auth;
use App\Http\Requests\SchoolReviewRequest;
use App\TeacherProfile;

class SchoolReviewController extends Controller
{
      public function __construct()
      {
      $this->middleware('auth');
      }

      public function create($id){

          $school = SchoolProfile::where('id', $id)->first();

          return view('frontend.pages.review.create', compact('school'));

      }


      public function store(SchoolReviewRequest $request, $id){
         
          $validated = $request->validated();
          
          
          $review = new SchoolReview();
          //dd($request->all());
          $review->name = $request->name;
          $review->content = $request->content;
          $review->user_id = $request->user_id;
          $review->slug = $request->slug;
          $review->image = Auth::user()->profile_image;
          $review->save();

          return redirect('/schools')->with(['status' => 'отзыв успешно отправлен']);

      }

      public function createTeacher($id){

        $teacher = TeacherProfile::where('id', $id)->first();

        return view('frontend.pages.review.teacher', compact('teacher'));

    }

    public function storeTeacher(SchoolReviewRequest $request, $id){
         
        $validated = $request->validated();
        
        
        $review = new SchoolReview();

        $review->name = $request->name;
        $review->content = $request->content;
        $review->user_id = $request->user_id;
        $review->slug = $request->slug;
        $review->image = Auth::user()->profile_image;
        $review->save();

        return redirect('/teachers')->with(['status' => 'отзыв успешно отправлен']);

    }


}
