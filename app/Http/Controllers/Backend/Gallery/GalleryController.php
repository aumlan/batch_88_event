<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Gallery::all();
        return view('Backend.gallery.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flag=[];
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $key=>$file){
//                $imageName = 'images/sliders/'.time().'.'.$file->extension();

                $ext=$file->getClientOriginalName();
                $t=time();
                $filename=($key+1).'-'.$t.'-'.Str::slug($request->name).uniqid().'.'.$file->extension();

                $file->move(public_path('images/sliders'), $filename);

                array_push($flag,$filename);

                Gallery::create([
                'slider_title'=>$request->name,
                'url'=>$request->url,
                'slug' =>Str::slug($request->name),
                'image'=>$filename,
                ]);

            }
        }
        else {
            $imageName=null;
        }

        return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::find($id)->delete();
        return back();
    }
}
