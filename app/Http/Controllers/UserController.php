<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
use Auth;

class UserController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user.create', compact('roles'));
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

          'required' => 'Ce champ est obligatoire.'

        ];
        $validated = $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required'

        ], $messages);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);

        $user->save();

        $user->roles()->attach($request->role);

        return redirect()->route('users')->with(['status' => 'user create successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.pages.user.edit', compact('user'));
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
        $messages = [

        'required' => 'Ce champ est obligatoire.',

        ];
        $validated = $request->validate([

        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['confirmed'],
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ], $messages);

        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($request->has('profile_image'))
        {
            $img = $request->file('profile_image');
            $name = Str::slug($request->name).'_'.time();
            $folder = '/uploads/images/';
            //dd($folder);
            $filePath = $folder . $name. '.' .$img->getClientOriginalExtension();
            $this->uploadOne($img, $folder, 'public', $name);
            $user->profile_image = $filePath;
        }

        $user->save();
        return redirect()->route('users')->with(['status' => 'profile modifier avec succes']);
    }

     /**
     * Current Login user can edit storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.pages.user.edit', compact('user'));
    }

    /**
     * Curent login User Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $messages = [

        'required' => 'Ce champ est obligatoire.'

        ];
        $validated = $request->validate([

        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['confirmed'],
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ], $messages);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($request->has('profile_image'))
        {
            $img = $request->file('profile_image');
            $name = Str::slug($request->name).'_'.time();
            $folder = '/uploads/images/';
            //dd($folder);
            $filePath = $folder . $name. '.' .$img->getClientOriginalExtension();
            $this->uploadOne($img, $folder, 'public', $name);
            $user->profile_image = $filePath;
        }

        $user->save();
        return redirect()->route('users')->with(['status' => 'profile modifier avec succes']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        $user->delete();

        return redirect()->route('users')->with(['status' => 'user delete successfully']);
    }
}
