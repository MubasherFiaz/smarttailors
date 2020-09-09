<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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
//         $ip = "39.40.110.25";
//          //dd(\Request::ip());
// $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
//     $loc=$details->loc;
//     $city=$details->city;
//     $country=$details->country;
//     $address=$city . ' , '.$country;

//     dd($address);
// $assignedTo = explode (',', $loc);
    
//     dd($assignedTo['0']); // -> "Mountain View"
$users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
         $id=auth()->user()->id;
         $user_info = User::where('id', $id)->first();
        //dd($user_info->name);

         return view('portal.profile.profile', compact('user_info','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_description(Request $request)
    {
       // dd($request);
        $validatedData = $request->validate([
       
            'description'=>'required',          
          
        ]);
        $id=auth()->user()->id;
         
            $m=User::where('id', $id)->update([
            'description' => $request->description,
           
            ]);
            if ($m) {
  return redirect('gallery')->with('message','Description Upload Successfully');               
            }
            else{
        return redirect('gallery')->with('error','Description Not Update'); 
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_search(Request $request)
    {
          $id=auth()->user()->id;
         
            $m=User::where('id', $id)->update([
            'rates' => $request->rates,
            'type' => $request->type,
            'availability' => $request->availability,
            'delivery' => $request->delivery,
           
            ]);
            if ($m) {
  return redirect('gallery')->with('message','Search Data Updated Successfully');               
            }
            else{
        return redirect('gallery')->with('error','Data Not Update'); 
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=auth()->user()->id;
       // $users = User::where('id', $id)->update($request);
          if($request->hasFile('img') && $request->img->isValid())
        {
            $extension=$request->img->extension();
            $filename=time()."_.".$extension; 
           
       $request->img->move(public_path('images'), $filename);
       $request->img = $filename;
            User::where('id', $id)->update([
            'img' => $filename,
           
            ]);
       }
        //$request->img = $filename;
        $users = User::where('id', $id)->update(request()->except(['_token','img']));
      //  dd($users);
        if ($users==1) {
        return redirect('profile')->with('message','Record Update Successfully');     
       
        }else {
        return redirect('profile')->with('message','Error');     
       
        }
    }  
      public function update_password(Request $request)
    {
        $id=auth()->user()->id;
       // $users = User::where('id', $id)->update($request);
        $user_info = User::find($id)->first();
        $pass=$user_info->password;
        
    $validatedData = $request->validate([
       
            'password'=>'required|string|min:8|confirmed',
              
        ]);

        if(password_verify($request->old_password, $pass)) {
        $pass= Hash::make($request->password);

 $users =User::where('id', $id)->update([
             'password' => $pass,
            ]);
      if ($users==1) {
        return redirect('profile')->with('message','Record Update Successfully');     
       
        }else {
        return redirect('profile')->with('message','Error');     
       
        }
          
}else{
     return back()->with('error','Please Enter Correct Current Password!');
}


          
        
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }  
      public function msg(Profile $profile)
    {
         return view('portal.message.message');
        
    }
}
