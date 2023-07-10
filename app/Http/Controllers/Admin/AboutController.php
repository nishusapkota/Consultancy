<?php

namespace App\Http\Controllers\Admin;


use App\Models\About;
use App\Models\AboutImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'title' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for images
        ]);

        try {
            DB::beginTransaction();

            $about = About::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move(public_path('about_image',$imageName));

                    $aboutImage = new AboutImage();
                    $aboutImage->about_id = $about->id;
                    $aboutImage->image = 'about_image/'.$imageName;
                    $aboutImage->save();
                }
            }

            DB::commit();

            return redirect()->route('admin.about.index')->with('success', 'About added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        return view('admin.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,About $about)
    {
       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for images
        ]);

        try {
            DB::beginTransaction();

            $about->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key=>$image) {
                    $img_name = time() . '_' . $request->file('images')[$key]->getClientOriginalName();
                    $request->file('images')[$key]->move(public_path('aboutImages'), $img_name);
                    AboutImage::create([
                        'about_id'=> $about->id,
                        'image'=>'aboutImages/'.$img_name,
                    ]);
                }
            }
            

            DB::commit();

            return redirect()->route('admin.about.index')->with('success', 'About updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    
    }
    function edit_image(About $about){
        $images=$about->images();
        // dd($images);
        return view('admin.about.edit_image',compact('images','about'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'About record deleted successfully');
    }
}
