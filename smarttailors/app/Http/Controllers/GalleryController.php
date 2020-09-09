<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id=auth()->user()->id;
        $imgs = Gallery::where('t_id', $id)->get();
        $des =User::where('id', $id)->first();
 $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
        //dd($des->description);
         return view('portal.gallery.index',compact('imgs','des','users'));
        
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
       // dd($request->img);
          $validatedData = $request->validate([
       
            'img'=>'required',          
          
        ]);
        $id=auth()->user()->id;
       // $users = User::where('id', $id)->update($request);
          if($request->hasFile('img') && $request->img->isValid())
        {
            $extension=$request->img->extension();
            $filename=time()."_.".$extension; 
           
       $request->img->move(public_path('images'), $filename);
       $request->img = $filename;
            Gallery::where('id', $id)->create([
            't_id' => $id,
            'img' => $filename,
            'description' => $request['description'],
             ]);

        return redirect('gallery')->with('message','Image Upload Successfully'); 
          
    }else{
        return redirect('gallery')->with('error','Select correct Image'); 
    }
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m=Gallery::where('id', $id)->delete();
        if($m){
        return redirect('gallery')->with('message','Image Deleted Successfully'); 
    }else{
        return redirect('gallery')->with('Error','Some Problem Occure'); 

    }
    }
}
