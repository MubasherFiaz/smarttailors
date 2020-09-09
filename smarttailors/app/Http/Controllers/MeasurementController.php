<?php

namespace App\Http\Controllers;

use App\Measurement;
use App\cloth_categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeasurementController extends Controller
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
    $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
   


        $cloth_categorys = cloth_categorys::orderBy('created_at', 'DESC')->get();
        $measurements = Measurement::join('cloth_categorys', 'measurements.category','=','cloth_categorys.id')->orderBy('measurements.created_at', 'DESC')->select('measurements.*','cloth_categorys.name as cat_name','cloth_categorys.id as cat_id')->get();

       
         return view('portal.measurement_settings.measurement_settings',compact('users','cloth_categorys','measurements'));
    }
     public function add_cloth_type(Request $req)
    {
        $validatedData = $req->validate([
       
            'name'=>'required|unique:cloth_categorys,name',
             
          
        ]);
        $filename="";
        if($req->hasFile('image') && $req->image->isValid())
        {

            $extension=$req->image->extension();
            $filename=time()."_.".$extension;         
       $req->image->move(public_path('tailor_imgs/images'), $filename);
       
       
       } 
     //  dd($filename);
      // dd($req->image);
         $Added =cloth_categorys::insert(
     array(
            'name' => $req['name'],
            'sex' => $req['sex'],
            'img'=>$filename,                        
            'created_by' =>  Auth()->user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),

         )
    );
if($Added){
            //return "done";
            //exit();
            return back()->with('message','Cloth Type Add Successfully!');
        }
    }    
     public function add_measurement_part(Request $req)
    {
    
        $Added =Measurement::where('name', $req->name)->where('category', $req->category)->count();
       // dd($Added);
if ($Added!=0) {
    return back()->with('error','Name with same Category Already Exit!');
}


       //print_r($req->image);exit();

       
 $Added =Measurement::insert(
     array(
            'category' => $req['category'],
            'name' => $req['name'],            
            'description'=>$req['description'],        
            'created_at' =>  date('Y-m-d H:i:s'),
            'created_by' =>  Auth()->user()->id,

         )
);
       if($Added){
            //return "done";
            //exit();
            return back()->with('message','Measurement Add Successfully!');
        }

    }
    public function edit_mea($id)
    {
 $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
        $data = Measurement::find($id);
        $cloth_categorys = cloth_categorys::get();
       // dd($data->id);
        return view('portal.measurement_settings.edit_mea_parts',compact('data','cloth_categorys','users'));

        
    }   
     public function edit_type($id)
    {
 $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
        $data = cloth_categorys::find($id);
         // dd($data->id);
        return view('portal.measurement_settings.edit_cloth_type',compact('data','users'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tailors  $tailors
     * @return \Illuminate\Http\Response
     */
    public function update_mea(Request $request)
    {
        //dd($request->description);
        $data = Measurement::find($request->id);
       
        $Added =Measurement::where('id', $request->id)->update([
            'category' => $request['category'],
            'name' => $request['name'],            
            'description'=>$request['description'],        
            

            ]);
       // exit();
        return redirect('measurement-setting')->with('message','Record Update Successfully');     


    }
      public function update_type(Request $request)
    {
       
 if(empty($request->image))
        {
            $img = $data->image;
        }
        else{
             $extension=$request->image->extension();
            $filename=time()."_.".$extension; 
           
       $request->image->move(public_path('tailor_imgs/images'), $filename);
            $img = $filename;

        }

        $Added =cloth_categorys::where('id', $request->id)->update([
             'name' => $request['name'],
            'sex' => $request['sex'],      
            'img'=>$img,
            

            ]);
       // exit();
        return redirect('measurement-setting')->with('message','Record Update Successfully');     


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tailors  $tailors
     * @return \Illuminate\Http\Response
     */
    public function delete_mea($id)
    {
        
        $id = DB::delete('delete from measurements where id = ?',[$id]);

    
       return redirect('measurement-setting')->with('message','Delete Record Successfully');     
    }   
     public function delete_type($id)
    {
        
        $id = DB::delete('delete from cloth_categorys where id = ?',[$id]);

    
       return redirect('measurement-setting')->with('message','Delete Record Successfully');     
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show(Measurement $measurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Measurement $measurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measurement $measurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurement $measurement)
    {
        //
    }
}
