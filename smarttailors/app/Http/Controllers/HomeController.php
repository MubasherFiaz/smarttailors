<?php

namespace App\Http\Controllers;

use App\User; 
use App\Message; 
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Mapper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
       return redirect()->action('DashboardController@index',compact('users'));

    }
    public function map()
    {
        Mapper::map(33.7215, 73.0433);

    return view('frontend.layout.master');
    }
    public function message()
    {
             

        $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");

     
    // dd($users);

        return view('home', ['users' => $users]);
    }
    public function getMessage($user_id)
    {
        //return $user_id;

        $my_id=auth()->user()->id;


        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->orwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('messages.index' , ['messages'=>$messages]);
    }
    public function sendMessage(Request $request)
    {

       // dd($request->message);
       $from= auth()->id();
       $to = $request->receiver_id;
         $message = Message::create([
            'from' =>auth()->id(),
            'to' =>$request->receiver_id,
            'text' =>$request->message,
            'is_read' =>0
        ]);
         //pusher
       
        $options = array(
            'cluster' => 'ap2',
            
           
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

         $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger( 'my-channel', 'my-event', $data);
         //dd($request->message);
       //return $this->message;
       
    }
}
