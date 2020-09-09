<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use App\pricing;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Measurement;
use App\cloth_categorys;
use Redirect;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tailor_order()
    {

    

        $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
    $orders = User::leftjoin('orders', 'users.id','=','orders.tailor_id')->where('orders.tailor_id', auth()->user()->id)->orderBy('orders.id', 'DESC')->select('users.*','orders.*','orders.created_at as order_created_data','orders.updated_at as order_update_date')->get();
   // dd(auth()->user()->id);
        return view('portal.tailor.order.index',compact('users','orders'));
        
    }   
    public function custumer_order()
    {
        $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
    $orders = User::leftjoin('orders', 'users.id','=','orders.tailor_id')->where('orders.custumer_id', auth()->user()->id)->orderBy('orders.id', 'DESC')->select('users.*','orders.*')->get();
   // dd($orders);      
        return view('portal.custumers.order.index',compact('users','orders'));
         
    }
      public function get_order_details($id)
    {
        
   
   $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
    //$orders = User::leftjoin('orders', 'users.id','=','orders.custumer_id')->where('orders.tailor_id', auth()->user()->id)->orderBy('orders.id', 'DESC')->select('users.*','orders.*')->get();
    $order = User::leftjoin('orders', 'users.id','=','orders.custumer_id')->where('orders.id', '=', $id)->orderBy('orders.id', 'DESC')->select('users.*','orders.*')->first();
  
    // return redirect::back()->with('error_code', 5); 
  // dd($order);
    $response = "<table border='0' width='100%'>";
     $response .= "<tr>";
 $response .= "<td>Name : </td><td>".$order['name']."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Phone Number : </td><td>".$order['phone_number']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Invoice No : </td><td>".$order['invoice_no']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Status: </td><td>".$order['o_status']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Delivery date : </td><td>".$order['delivery_date']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Total Payment : </td><td>".$order['total_payment']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Note : </td><td>".$order['note']."</td>";
 $response .= "</tr>";
 $response .= "<tr>";
 $response .= "<td>Payment Method : </td><td>".$order['payment_method']."</td>";
 $response .= "</tr>";
 $response .= "<tr>";
 $response .= "<td>Delivery Method : </td><td>".$order['delivery_method']."</td>";
 $response .= "</tr>";

$response .= "</table>";
        return $response;
}
      public function get_order_c_details($id)
    {
        
  //  echo $id;exit();
  

    $order = User::leftjoin('orders', 'users.id','=','orders.custumer_id')->where('orders.id', '=', $id)->orderBy('orders.id', 'DESC')->select('users.*','orders.*')->first();
  //  echo $order;exit();
  
    // return redirect::back()->with('error_code', 5); 
   //dd($order);
    $response = "<table border='0' width='100%'>";
     $response .= "<tr>";
 $response .= "<td>Name : </td><td>".$order['name']."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Phone Number : </td><td>".$order['phone_number']."</td>";
 $response .= "</tr>"; 
 $response .= "<tr>";
 $response .= "<td>Invoice No : </td><td>".$order['invoice_no']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Status: </td><td>".$order['o_status']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Invoice No : </td><td>".$order['invoice_no']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Total Payment : </td><td>".$order['total_payment']."</td>";
 $response .= "</tr>";
$response .= "<tr>";
 $response .= "<td>Payed Payment : </td><td>".$order['payment_received']."</td>";
 $response .= "</tr>";
 $response .= "<tr>";
 $response .= "<td>Payment Method : </td><td>".$order['payment_method']."</td>";
 $response .= "</tr>";
 $response .= "<tr>";
 $response .= "<td>Delivery Method : </td><td>".$order['delivery_method']."</td>";
 $response .= "</tr>";

$response .= "</table>";
        return $response;
}

    
    public function update_status(Request $request, $invoice_no)
    {
      //  dd($invoice_no);
        $order = Order::where('invoice_no',$invoice_no)->first();
        $order->o_status = $request->input('o_status');
       
        $order->save();
    }   public function update_pay(Request $request, $invoice_no)
    {
       // dd($invoice_no);
        $order = Order::where('invoice_no',$invoice_no)->first();
        $order->payment_received = $request->input('pay_r');
       
        $order->save();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function custumer_measurement_details($name)
    {
        $users = DB::select("select users.id,users.city, users.role, users.name, users.img, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . auth()->user()->id . "
        where users.id != " . auth()->user()->id . " 
        group by users.id,users.city, users.role, users.name, users.img, users.email");
        
         $g= User::where('name',$name)->pluck('gender')->first();
         $custumer_info= User::where('name',$name)->first();
         $cat = cloth_categorys::where('sex',$g)->get();

       //  dd($cat);

return view('portal.tailor.order.custumer_measurements',compact('users','cat','custumer_info'));
    }
 public function get_c_category(Request $request)
    {
    
      
        //dd($request->category);

   $data = Measurement::leftjoin('custumer_measurements', 'custumer_measurements.measurement_part_id','=','measurements.id')->where('category', $request->category)->where('custumer_measurements.custumer_id', $request->id)->select('measurements.*','custumer_measurements.measurement as mea')->get(); 

//dd($data);
        $img= cloth_categorys::where('id', $request->category)->pluck('img')->first();
//dd($img);
     
return view('portal.tailor.order.measurement_form',compact('data','img'));

       
        
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_order(Request $request)
    {
        $custumer_id=auth()->user()->id;
         $c= count($request->category);
         $p=0;

                 for ($i=0; $i < $c; $i++) { 
                   $pricing = pricing::where('tailor_id',$request->tailor_id)->where('category_id',$request->category[$i])->select('price')->first();

                   if($pricing->price!='')
                   {
                   $p=$p+$pricing->price;

                   }

                 }

       $validatedData = $request->validate([      
 
            
            
            'tailor_id' => 'required',
            
           
        ]);  
 $category=implode(" | ",$request->category);

$lastInvoiceno = Order::orderBy('id', 'desc')->pluck('invoice_no')->first();

if ($lastInvoiceno=='') {
   
    $v='SM000001';

}
//dd($lastInvoiceno);
else{
$v =  ++$lastInvoiceno ;
}
//dd($v);

        $r= Order::create([
            'delivery_date' => $request['data'],
            'payment_method' => $request['payment_method'],
            'delivery_method' => $request['delivery_method'],
            'note' => $request['note'],
            'tailor_id' => $request['tailor_id'],            
            'custumer_id' => $custumer_id,
            'total_payment' => $p,
            'categories' => $category,
            'invoice_no' => $v,
            'o_status' => 'Assigned',
           

        ]);
     if ($r) {
            $msg = 'Your Order in Placed Invoice No is '.$v;
return redirect()->back()->with('message',$msg); ;
           
        }
        else{
return back()->with('error','Please type Correct Info and try again');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
