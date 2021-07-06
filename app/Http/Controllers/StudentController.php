<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use App\StudentPost;
use App\SchoolProfile;
use App\TeacherProfile;
use Auth;
use App\Job;

class StudentController extends Controller
{
      public function __construct()
      {
      $this->middleware('auth',['except' => 'index']);
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = StudentPost::latest()->paginate(10);
        if(Auth::check()){
          $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
          $teacher = TeacherProfile::where('user_id', auth()->user()->id)->first();

          return view('frontend.pages.student.index', compact('posts','school','teacher'));
        }

        return view('frontend.pages.student.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('frontend.pages.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        $post = new StudentPost();
        
        $post->name = $request ->name;
        $post->email = $request ->email;
        $post->title = $request ->title;
        $post->content = $request ->content;
        $post->city = $request ->city;
        $post->user_id = $request ->user_id;
        $post->slug = Str::slug($request ->title, '-');


        $post->save();
        

        return redirect('/students')->with(['status' => 'Пост успешно создан.']);
    }

     public function mypost()
     {
       $posts = StudentPost::where('user_id', Auth::user()->id)->get();
       return view('frontend.pages.student.post', compact('posts'));
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = StudentPost::where('slug', $slug)->first();
        $posts = StudentPost::latest()->where('id','!=', $post->id)->take(5)->get();
        $school = SchoolProfile::where('user_id', auth()->user()->id)->first();
        $teacher = TeacherProfile::where('user_id', auth()->user()->id)->first();
        $jobs = Job::latest()->take(5)->get();
        return view('frontend.pages.student.show',compact('post','posts','school','teacher','jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = StudentPost::where('id', $id)->first();
        return view('frontend.pages.student.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated =  $request->validate([
        'name' => 'required | max:50',
        'email' => 'required',
        'user_id' => 'required',
        'city' => 'required',
        'title' => 'required|max:100',
        'content' => 'required',
        ]);

        
        $validated['slug'] = Str::slug($validated['title'], '-');
        
        $post = StudentPost::where('id', $id)->first();

        $post->update($validated);

        return redirect('/students')->with(['status' => 'Сообщение успешно обновлено.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = StudentPost::where('id', $id)->first();

        $post->delete();

        return redirect('/students')->with(['status' => 'сообщение успешно удалено.']);

    }

    public function posts()
    {
        $posts = StudentPost::latest()->paginate(10);
        return view('admin.pages.posts.index', compact('posts'));
    }
}
