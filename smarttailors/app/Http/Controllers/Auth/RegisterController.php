<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
            'phone_number' => ['required','unique:users,phone_number','min:11'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $ip = "39.40.110.25";
       //  dd($data);
         if ($data['role']=='custumer') 
         {
          if ($data['img']=='null') 
          {
                $img = "img1.jpg";
          }if ($data['img']!='null'){
              if($data->hasFile('img') && $data->img->isValid())
        {
            $extension=$data->img->extension();
            $filename=time()."_.".$extension; 
           
       $data->img->move(public_path('images'), $filename);
       $img = $filename;
          
       }
          }  
             $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $loc=$details->loc;
    $city=$details->city;
    $country=$details->country;    
    $address=$city . ' , '.$country;
   // dd($address);
$assignedTo = explode (',', $loc);
    $latitude=$assignedTo['0'];
    $longitude=$assignedTo['1'];  
   // dd($latitude); 
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'city' => $city,
            'lat' => $latitude,
            'lng' => $longitude,
            'country' => $country,           
            'status' => 1,
            'img' => $img,

        ]);
         }
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $loc=$details->loc;
    $city=$details->city;
    $country=$details->country;    
    $address=$city . ' , '.$country;
   // dd($address);
$assignedTo = explode (',', $loc);
    $latitude=$assignedTo['0'];
    $longitude=$assignedTo['1'];
   // dd($longitude); 
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'city' => $city,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'country' => $country,
            'address' => $address,
            'status' => 1,

        ]);
       

    }
}
