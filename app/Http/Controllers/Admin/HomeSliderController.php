<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HomeSlider::all();

        return view('admin.homeslider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homeslider.create');
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
            'sub_heading' => 'nullable',
            'description' => 'nullable|max:100',
            'file' => 'required|mimes:png,jpg,jpeg,mp4,mov,mkv',
        ]);
        $file_name = $request->file('file')->getClientOriginalName();
        $ext = $request->file('file')->getClientOriginalExtension();

        if ($ext == 'mp4') {
            $request->file('file')->move(public_path('slider/video'), $file_name);
        } else {
            $request->file('file')->move(public_path('slider/image'), $file_name);
        }
        HomeSlider::create([
            'title' => $request->title,
            'description' => $request->description,
            'sub_heading' => $request->sub_heading,
            'file' => $ext == 'mp4' ? 'slider/video/' . $file_name : 'slider/image/' . $file_name,
            'extension' => $ext
        ]);

        return redirect()->route('admin.home.index')->with('success', 'record created successfully');
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
        $slider = HomeSlider::find($id);
        return view('admin.homeslider.edit', compact('slider'));
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
            'title' => 'required',
            'sub_heading' => 'nullable',
            'description' => 'nullable|max:100',
            'file' => 'nullable|mimes:png,jpg,jpeg,mp4,mov,mkv',
        ]);
        $slider=HomeSlider::find($id);
        if (!$slider) {
            return redirect()->back()->with('error', 'Slider Not Found');
        }
        if ($request->hasFile('file')) {
            unlink(public_path($slider->file));
            $file_name = time() . '_' . $request->file('file')->getClientOriginalName();
            $ext = $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('slider'), $file_name);

            $data=[
                'title' => $request->title,
                'description' => $request->description,
                'sub_heading' => $request->sub_heading,
                'file' => 'slider/' . $file_name,
                'extension' => $ext
            ];
        }else {
            $data=[
                'title' => $request->title,
                'description' => $request->description,
                'sub_heading' => $request->sub_heading ,
            ];
        }
        
        $slider->update($data);

        return redirect()->route('admin.home.index')->with('success', 'Slider Has Been Updated created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = HomeSlider::find($id);
        if ($slider->file && file_exists(public_path($slider->file))) {
            unlink(public_path($slider->file));
        }
        $slider->delete();
        return redirect()->route('admin.home.index')->with('success', 'record deleted successfully');
    }
}
