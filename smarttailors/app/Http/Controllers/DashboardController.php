<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;

class DashboardController extends Controller
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

     
    // dd($users);

       if (auth()->user()->role == 'tailor') {
     $orders  = Order::where('tailor_id' , auth()->user()->id)->count(); 
        $completed_orders  = Order::where('tailor_id' , auth()->user()->id)->where('o_status' , 'Delivered')->count(); 
        $assigned  = Order::where('tailor_id' , auth()->user()->id)->where('o_status' , 'Assigned')->count(); 
        $ready  = Order::where('tailor_id' , auth()->user()->id)->where('o_status' , 'Ready')->count(); 
        $delivered  = Order::where('tailor_id' , auth()->user()->id)->where('o_status' , 'Delivered')->count(); 
        $total_income  = Order::where('tailor_id' , auth()->user()->id)->get()->sum("total_payment");
        $income_received  = Order::where('tailor_id' , auth()->user()->id)->get()->sum("payment_received");
       //dd($income_received); 
          return view('portal.tailor.dashboard', compact('users','orders','completed_orders','assigned','ready','delivered','total_income','income_received'));

     }
       else if (auth()->user()->role == 'custumer')
       {
        $orders  = Order::where('custumer_id' , auth()->user()->id)->count(); 
        $completed_orders  = Order::where('custumer_id' , auth()->user()->id)->where('o_status' , 'Delivered')->count(); 
        $assigned  = Order::where('custumer_id' , auth()->user()->id)->where('o_status' , 'Assigned')->count(); 
        $ready  = Order::where('custumer_id' , auth()->user()->id)->where('o_status' , 'Ready')->count(); 
        $delivered  = Order::where('custumer_id' , auth()->user()->id)->where('o_status' , 'Delivered')->count(); 
          return view('portal.custumers.dashboard', compact('users','orders','completed_orders','assigned','ready','delivered'));

       }      
        else if (auth()->user()->role == 'admin')
       {
        $custumers  = User::where('role' , 'custumer')->count(); 
        $tailor  = User::where('role' , 'tailor')->count(); 
        $orders  = Order::count(); 
        $completed_orders  = Order::where('o_status' , 'Delivered')->count(); 
        $pending_orders  = Order::where('o_status' ,'!=', 'Delivered')->count(); 
           
         return view('portal.admin.dashboard', compact('users','custumers','tailor','orders','completed_orders','pending_orders'));


       }
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
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
