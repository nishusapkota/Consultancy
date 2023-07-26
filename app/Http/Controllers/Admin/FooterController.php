<?php

namespace App\Http\Controllers\Admin;

use App\Models\Footer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class footerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $footers = Footer::all();
    //     return view('admin.footer.index', compact('footers'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.footer.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLogo(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'image' => 'required',
           
        ]);
        $footer = Footer::first();
        if ($footer) {
            if ($request->hasFile('image')) {
                if ($footer->image && file_exists(public_path($footer->image))) {
                    unlink(public_path($footer->image));
                    
                }  
                $image = $request->file('image');
                    $img_name = time()."_".$image->getClientOriginalName();
                   $image->move(public_path('footer_logo'), $img_name);     
                 }
            $footer->update([
                'image' => $request->hasfile('image') ? 'footer_logo/' . $img_name : $footer->image,
                
            ]);
            return redirect()->back()->with('success', 'footer-logo updated successfully');
        } 
        else {
            if ($request->hasFile('image')) { 
                $image = $request->file('image');
                    $img_name = time()."_".$image->getClientOriginalName();
                   $image->move(public_path('footer_logo'), $img_name);     
                 }
            Footer::create([
                'image' => 'footer_logo/' . $img_name ,
                
            ]);
            return redirect()->back()->with('success', 'footer-logo created successfully');
        }
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'address' => 'required',
            'description' => 'required|max:300',
            'email' => 'required|email',
            'phone' =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
           
        ]);
        $footer = Footer::first();
        if ($footer) {
            $footer->update([
                'address' => $request->address,
                'description' => $request->description,
                'email' => $request->email,
                'phone' => $request->phone,
                
            ]);
            return redirect()->back()->with('success', 'footer updated successfully');
        } else {
            Footer::create([
                'address' => $request->address,
                'description' => $request->description,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            return redirect()->back()->with('success', 'footer created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Footer $footer)
    // {
    //     return view('admin.footer.show', compact('footer'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editLogo(Footer $footer)
    {
        $footer = Footer::first();
       
        $data=[
            'image'=> $footer ? $footer->image : null,
        ];
        return view('admin.footer.editLogo', compact('data'));
    }
    public function edit(Footer $footer)
    {
        $footer = Footer::first();
        $data=[
            'address'=>$footer?$footer->address:null,
            'description '=>$footer?$footer->description :null,
            'email'=>$footer?$footer->email:null,
            'phone'=>$footer?$footer->phone:null,
            'description'=>$footer?$footer->description:null,
        ];
        return view('admin.footer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, footer $footer)
    // {
    //     $data = $request->validate([
    //         'title' => 'required|unique:footers,title,' . $footer->id,
    //         'short_description' => 'required',
    //         'image' => 'nullable',
    //         'body' => 'required',
    //         'extra' => 'required',
    //         'status' => 'nullable|boolean'
    //     ]);
    //     $slug = Str::slug($request->title);
    //     $counter = 1;
    //     while (footer::where('slug', $slug)->exists()) {
    //         $slug = Str::slug($request->title) . '-' . $counter;
    //         $counter++;
    //     }
    //     if ($request->hasFile('image')) {
    //         unlink(public_path($footer->image));
    //         $image = $request->file('image');
    //         $img_name = $image->getClientOriginalName();
    //         $image->move(public_path('footer'), $img_name);
    //     }
    //     $footer->update([
    //         'title' => $request->title,
    //         'slug' => $slug,
    //         'image' => $request->hasfile('image') ? 'footer/' . $img_name : $footer->image,
    //         'short_description' => $request->short_description,
    //         'body' => $request->body,
    //         'extra' => $request->extra,
    //         'status' => $request->status ? 1 : 0
    //     ]);
    //     return redirect()->route('admin.footer.index')->with('success', 'footer updated successfully');
    // }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(footer $footer)
    // {
    //     $footer->delete();
    //     return redirect()->route('admin.footer.index')->with('success', 'footer deleted successfully');
    // }
}
