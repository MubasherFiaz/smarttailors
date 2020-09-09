<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\pricing;
use App\cloth_categorys;
use App\User;
use App\Frontend;
use App\Shop;
use App\Gallery;
use App\Measurement;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        return view('frontend.index');
    }

    public function about_us()
    {
        return view('frontend.about');
    }
    public function privacy()
    {
        return view('frontend.privacypolicy');
    }
    public function faq()
    {
        return view('frontend.faq');
    }
    public function our_working()
    {
        return view('frontend.working');
    }
    public function tailors()
    {
        $latitude       =       "33.410088";
        $longitude      =       "73.047890";

        $shops          =       DB::table("users");

        $shops          =       $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(lat))) AS distance"));
        $shops          =       $shops->having('distance', '<', 80);
        $shops          =       $shops->where('role', '=', 'tailor');
        $shops          =       $shops->orderBy('distance', 'asc');

        $shops          =       $shops->take(10)->get();


        return view('frontend.tailors', compact("shops"));
    }
    public function search_tailors(Request $data)
    {
        //  dd($data->location);
        if ($data->location == 'n_b') {

            $latitude       =       "33.410088";
            $longitude      =       "73.047890";

            $shops          =       DB::table("users");

            $shops          =       $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(lat))) AS distance"));
            $shops          =       $shops->having('distance', '<', 80);
            $shops          =       $shops->where('role', '=', 'tailor');
            $shops          =       $shops->where('rates', '=', $data->rates);
            $shops          =       $shops->where('type', '=', $data->type);
            $shops          =       $shops->where('availability', '=', $data->availability);
            $shops          =       $shops->where('delivery', '=', $data->delivery);

            $shops          =       $shops->take(10)->get();
        } else {


            $shops          =       DB::table("users");

            $shops          =       $shops->select("*");
            $shops          =       $shops->where('role', '=', 'tailor');
            $shops          =       $shops->where('rates', '=', $data->rates);
            $shops          =       $shops->where('type', '=', $data->type);
            $shops          =       $shops->where('availability', '=', $data->availability);
            $shops          =       $shops->where('delivery', '=', $data->delivery);

            $shops          =       $shops->get();
        }

        return view('frontend.search_tailor', compact("shops"));
    }
    public function contact_us()

    {
        return view('frontend.contact');
    }
    public function choose()
    {


        return view('auth.choose');
    }
    public function r_as_tailor()
    {
        $category = cloth_categorys::get();
        //   dd($category);
        return view('auth.r_as_tailor', compact("category"));
    }
    public function r_as_user()
    {
        return view('auth.r_as_user');
    }
    public function in(Request $request)
    {

        $latitude       =       "33.410088";
        $longitude      =       "73.047890";

        $shops          =       DB::table("users");

        $shops          =       $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(lat))) AS distance"));
        $shops          =       $shops->having('distance', '<', 80);
        $shops          =       $shops->where('role', '=', 'tailor');
        $shops          =       $shops->orderBy('distance', 'asc');

        $shops          =       $shops->take(3)->get();
        //dd($shops);
        $locations = User::all();
        // dd($locations);
        $locations->location_latitude = User::get('lat');
        $locations->location_longitude = User::get('lng');
        // dd($locations->location_longitude);

        return view('frontend.map.index', compact("shops", "locations"));
    }


    // ------------ load shop view ---------------
    public function create()
    {
        return view('frontend.create-shop');
    }

    protected function create_tailor(Request $data)
    {


        $validatedData = $data->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
            'phone_number' => 'required|unique:users|min:11',
            'address' => 'required',
            'cnic' => 'required|unique:users',
        ]);



        $ip = "39.40.110.25";
        //dd($data->img);
        $img;
        if ($data['img'] == '') {
            //  dd("done");
            $img = "img1.png";
        }
        if ($data['img'] != 'null') {
            if ($data->hasFile('img') && $data->img->isValid()) {
                $extension = $data->img->extension();
                $filename = time() . "_." . $extension;

                $data->img->move(public_path('images'), $filename);
                $img = $filename;
            }
            //  dd($img);
        }
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        $loc = $details->loc;
        $city = $details->city;
        $country = $details->country;
        $address = $city . ' , ' . $country;
        // dd($address);
        $assignedTo = explode(',', $loc);
        $latitude = $assignedTo['0'];
        $longitude = $assignedTo['1'];
        $des = "We provide best stitching services in your city, Contact us we provide 24/7 online service.";
        // dd($latitude); 
        $r = User::create([
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
            'rating' => 1,
            'img' => $img,
            'gender' => $data['gender'],
            'address' => $data['address'],
            'cnic' => $data['cnic'],
            'description' => $des,
            'rates' => 'all',
            'type' => 'all',
            'availability' => 'all',
            'delivery' => 'both',

        ]);
        if ($r) {
            $u = User::where('email', $data['email'])->select('id')->first();
            $c = count($data->category);
            for ($i = 0; $i < $c; $i++) {
                $Added = pricing::insert(
                    array(
                        'tailor_id' => $u->id,
                        'category_id' => $data->category[$i],
                        'created_at' =>  date('Y-m-d H:i:s'),

                    )
                );
            }
            $users = null;
            return redirect()->action('DashboardController@index', compact('users'));
        }
    }
    protected function create_user(Request $data)
    {

        //dd($data);
        $validatedData = $data->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',

            'phone_number' => 'required|unique:users|min:11',
        ]);



        $ip = "39.40.68.210";
        //  dd($data);

        if ($data['img'] == '') {
            $img = "img1.png";
        }
        if ($data['img'] != 'null') {
            if ($data->hasFile('img') && $data->img->isValid()) {
                $extension = $data->img->extension();
                $filename = time() . "_." . $extension;

                $data->img->move(public_path('images'), $filename);
                $img = $filename;
            }
        }
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        $loc = $details->loc;
        $city = $details->city;
        $country = $details->country;
        $address = $city . ' , ' . $country;
        // dd($address);
        $assignedTo = explode(',', $loc);
        $latitude = $assignedTo['0'];
        $longitude = $assignedTo['1'];
        // dd($latitude); 
        $r = User::create([
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
            'rating' => 1,

            'img' => $img,
            'gender' => $data['gender'],

        ]);
        if ($r) {
            $users = null;
            return redirect()->action('DashboardController@index', compact('users'));
        }
    }



    // ----------------- save shop detail ----------------------
    public function store(Request $request)
    {
        $request->validate([
            "shop_name"     =>  "required",
            "location"      =>  "required",
        ]);
        //dd($request);

        // $result =(string) $client->post(“https://maps.googleapis.com/maps/api/geocode/json?address=$address”, [ ‘form_params’ => [‘key’=>’AIzaSyAel4iFWtIXAOlR_8lxIS3SAIVGvec-udo’]])->getBody();
        $json = json_decode($result);
        $address->lat = $json->results[0]->geometry->location->lat;
        $address->lng = $json->results[0]->geometry->location->lng;

        $dataArray      =       array(


            "shop_name"         =>      $request->shop_name,
            "address"           =>      $request->location,
            "description"       =>      $request->description,
            "latitude"          =>      $request->latitude,
            "longitude"         =>      $request->longitude,

        );


        $shop           =       Shop::create($dataArray);

        if (!is_null($shop)) {
            return back()->with("success", "Shop details saved successfully");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function tailor_details($name)
    {
        // return view('frontend.contact');

        $user = User::where('name', $name)->where('role','tailor')->first();

        $pricing = pricing::join('cloth_categorys', 'pricings.category_id', '=', 'cloth_categorys.id')->orderBy('pricings.created_at', 'DESC')->where('pricings.tailor_id', $user['id'])->select('pricings.*', 'cloth_categorys.name as c_name', 'cloth_categorys.id as cat_id', 'cloth_categorys.img as image')->get();
        // dd($user);
        $imgs = Gallery::where('t_id', $user['id'])->get();
        // dd($imgs);

        return view('frontend.tailor_details', compact('pricing', 'user', 'imgs'));


        //dd($name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}