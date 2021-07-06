<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\SchoolProfile;
use Auth;

class BrancheController extends Controller
{

    public function __construct()
    {
     $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.school.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [

            'required' => 'обязательно',
        ];
        $request->validate([
            'city'=>'required',
            'address' => 'required',
            'phone' => 'required',
        ], $messages);
        
        //dd($request->all());
        $branch = new Branch();
        $branch->city = $request->city;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        //dd($request->all());
        $school = SchoolProfile::where('user_id', Auth::user()->id)->first();
        $branch->school_profile_id = $school->id;
        //dd($request->all());
        $branch->save();
       // dd($request->all());

        return redirect()->back()->with(['status' => 'ветвь успешно добавлена.']);

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
        $branch = Branch::where('id', $id)->first();
        return view('frontend.pages.school.branch.edit', compact('branch'));
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
        $branch = Branch::where('id', $id)->first();
        $branch->city = $request->city;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->save();

        return redirect('school/our-programs')->with(['status' => 'ветка успешно Удалить.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::where('id', $id)->first();
        $branch->delete();

        return redirect('school/our-programs')->with(['status' => 'ветка успешно обновлена.']);
    }
}
