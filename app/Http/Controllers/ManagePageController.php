<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ManagePageController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::All();
        return view('admin.pages.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:50',
            'content' => 'required',
            'image' => 'required |mimes:jpeg,png,jpg | max:2048',
        ]);

        $page = new Page();
        $page->name = $request->name;
        $page->content = $request->content;

        $img = $request->image;
        $name = Str::slug($request->name).'_'.time();
        $folder = '/uploads/images/';
        $filePath = $folder . $name. '.' . $img->getClientOriginalExtension();
        $this->uploadOne($img, $folder, 'public', $name);
        $page->image = $filePath;
        $page->save();
        return redirect()->route('pages')->with(['status' => 'Page create successfully']);

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
        $page = Page::where('id', $id)->first();
        return view('admin.pages.page.edit', compact('page'));
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
        $request->validate([
            'name' => 'required | max:50',
            'content' => 'required',
            'image' => 'mimes:jpeg,png,jpg | max:2048',
        ]);

        $page = Page::where('id', $id)->first();
        $page->name = $request->name;
        $page->content = $request->content;

        if($request->has('image'))
        {
            $img = $request->image;
            $name = Str::slug($request->name).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $img->getClientOriginalExtension();
            $this->uploadOne($img, $folder, 'public', $name);
            $page->image = $filePath;
        }
       
        $page->save();
        return redirect()->route('pages')->with(['status' => 'Page update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::where('id', $id)->first();
        $page->delete();
        return redirect()->route('pages')->with(['status' => 'Page delete successfully']);
    }
}
