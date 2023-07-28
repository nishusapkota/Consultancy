<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Models\UniversitySlider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = UniversitySlider::all();

        return view('university.request-slider.index', compact('sliders'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.request-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //    dd($request->all());
      $request->validate([
        'image' =>'required|mimes:png,jpg,jpeg,mp4,mov,mkv',

    ]);
    $file_name = time()."_".$request->file('image')->getClientOriginalName();
    $ext = $request->file('image')->getClientOriginalExtension();
    if ($ext == 'mp4'||$ext == 'mov'||$ext == 'mkv') {
        $request->file('image')->move(public_path('university/video'), $file_name);
    } else {
        $request->file('image')->move(public_path('university/image'), $file_name);
    }
    UniversitySlider::create([
        'image' => ($ext == 'mp4'||$ext == 'mov'||$ext == 'mkv') ? 'university/video/' . $file_name : 'university/image/' . $file_name,
        'ext' => $ext,
        'university_id' => Auth::user()->university_id
    ]);
    return redirect()->route('university.slider.index')->with('success', 'Request Slider Image created successfully');

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
       
        $slider = UniversitySlider::find($id);
        return view('university.request-slider.edit', compact('slider'));
    
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
        $slider = UniversitySlider::find($id);
        // dd($request->all());
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg,mp4,mov,mkv'
        ]);
        if ($request->hasFile('image')) {
            unlink(public_path($slider->image));
            $file_name = time() . '_' . $request->file('image')->getClientOriginalName();
            $ext = $request->file('image')->getClientOriginalExtension();
            

        if ($ext == 'mp4'||$ext == 'mov'||$ext == 'mkv') {
            $request->file('image')->move(public_path('university/video'), $file_name);
        } else {
            $request->file('image')->move(public_path('university/image'), $file_name);
        }

            $data=[
                'image' => ($ext == 'mp4'||$ext == 'mov'||$ext == 'mkv')? 'university/video/' . $file_name : 'university/image/' . $file_name,
                'ext' => $ext
            ];
            $slider->update($data);
            return redirect()->route('university.slider.index')->with('success', 'Slider Image updated successfully');    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=UniversitySlider::find($id);
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
            $slider->delete();
            return redirect()->route('university.slider.index')->with('success', 'Slider Images deleted successfully');    
        }
    }
}
