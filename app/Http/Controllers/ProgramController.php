<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolProfile;
use App\TeacherProfile;
use App\Program;
use Auth;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\Http\Requests\ProgramRequest;
use App\Branch;

class ProgramController extends Controller
{
    
    use UploadTrait;

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
         $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
         $school_user_id = $school->user_id;
         $programs = Program::where('user_id', $school_user_id)->latest()->get();
         $branches = Branch::where('school_profile_id', $school->id)->latest()->get();
         return view('frontend.pages.program.index', compact('school','branches','programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
        return view('frontend.pages.program.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
         $validated = $request->validated();

         $program = new Program();

         $program->name = $request->name;
         $program->user_id = $request->user_id;
         $program->level = $request->level;
         $program->price = $request->price;
         $program->category = $request->category;

         $image = $request->image;
         $name = Str::slug($request->name).'_'.time();
         $folder = '/uploads/images/';
         $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();

         $this->uploadOne($image, $folder, 'public', $name);

         $program->image= $filePath;

         $program->save();

         return back()->with(['status' => 'програм успешно создан.']);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
        $program = Program::where('id', $id)->first();
        return view('frontend.pages.program.edit', compact('school','program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, $id)
    {
        $validated = $request->validated();

        $program = Program::findOrFail($id);

        $program->name = $request->name;
        $program->category = $request->category;
        $program->level = $request->level;
        $program->price = $request->price;
        $program->user_id = $request->user_id;

        $image = $request->image;
        $name = Str::slug($request->name).'_'.time();
        $folder = '/uploads/images/';
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        $this->uploadOne($image, $folder, 'public', $name);
        $program->image= $filePath;

        $program->save();

        return redirect('school/our-programs')->with(['status' => 'программа успешно обновлен.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $program = Program::where('id', $id)->first();

         $program->delete();

         return redirect('/school/our-programs')->with(['status' => 'программа успешно удалено.']);
    }
}
