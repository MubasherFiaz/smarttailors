<?php

namespace App\Http\Controllers;

use App\Custumer;
use App\cloth_categorys;
use App\Measurement;
use App\CustumerMeasurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CustumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function measurement()
    {
         $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
         $s= Auth()->user()->gender;
         $cat = cloth_categorys::where('sex',$s)->get();

return view('portal.custumers.measurement',compact('users','cat'));

    }

    /**
     * Show the form for creating a new resource..
     *
     * @return \Illuminate\Http\Response
     */
    public function get_category(Request $request)
    {
        
        $data = Measurement::where('category',$request->category)->select('measurements.*')->get(); 
      //  dd($data);        
        //$data = Measurement::leftjoin('custumer_measurements', 'custumer_measurements.measurement_part_id','=','measurements.id')->where('category',$request->category)->where('custumer_measurements.custumer_id',Auth()->user()->id)->select('measurements.*','custumer_measurements.measurement as mea')->get();       
 
        
        $img= cloth_categorys::where('id',$request->category)->pluck('img')->first();
     
return view('portal.custumers.measurement_form',compact('data','img'));

       
        
    }   
     public function show_category(Request $request)
    {
       // dd($request);
        
               
        $data = Measurement::leftjoin('custumer_measurements', 'custumer_measurements.measurement_part_id','=','measurements.id')->where('category',$request->category)->where('custumer_measurements.custumer_id',Auth()->user()->id)->select('measurements.*','custumer_measurements.measurement as mea')->get();       
 //  dd($data);
        
        $img= cloth_categorys::where('id',$request->category)->pluck('img')->first();
     
return view('portal.custumers.show_measurement',compact('data','img'));

       
        
    }

    public function save_measurements(Request $request)
    {
        //dd($request);
        $data = CustumerMeasurement::where('measurement_category_id',$request->category[0])->where('custumer_id',Auth()->user()->id)->first();
            $c= count($request->mea);
         $validatedData = $request->validate([
       
            'mea.*'=>'required',          
          
        ]);
        if ($data=='') {
          
         for ($i=0; $i < $c; $i++) { 
$Added =CustumerMeasurement::insert(
     array(
            'custumer_id' => Auth()->user()->id,
            'measurement_part_id' => $request->m_id[$i],            
            'measurement_category_id' => $request->category[$i] ,
            'created_by' => Auth()->user()->id,
            'measurement' =>  $request->mea[$i],

         )
    );
        }}else{
      
         for ($i=0; $i < $c; $i++) { 
$Added =CustumerMeasurement::where('measurement_part_id', $request->m_id[$i])->where('measurement_category_id', $request->category[$i])->where('custumer_id', Auth()->user()->id)->update(
     array(
            'custumer_id' => Auth()->user()->id,
            'measurement_part_id' => $request->m_id[$i],            
            'measurement_category_id' => $request->category[$i] ,
            'created_by' => Auth()->user()->id,
            'measurement' =>  $request->mea[$i],

         )
    );
        }

       
         } 

return redirect()->back()->with('message','Measurement Add Successfully'); ;
        
        
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
     * @param  \App\Custumer  $custumer
     * @return \Illuminate\Http\Response
     */
    public function show(Custumer $custumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custumer  $custumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Custumer $custumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custumer  $custumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custumer $custumer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custumer  $custumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custumer $custumer)
    {
        //
    }
}
