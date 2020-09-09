<?php
 
namespace App\Http\Controllers;

use App\pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\cloth_categorys;

class PricingController extends Controller
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
        $cloth_categorys = cloth_categorys::select('name','id')->orderBy('created_at', 'DESC')->get();
        $pricing = pricing::where('tailor_id', auth()->user()->id)->select('price','category_id','id')->orderBy('created_at', 'DESC')->get();
 


$pricing = pricing::join('cloth_categorys', 'pricings.category_id','=','cloth_categorys.id')->orderBy('pricings.created_at', 'DESC')->where('pricings.tailor_id', auth()->user()->id)->select('pricings.*','cloth_categorys.name as c_name','cloth_categorys.id as cat_id','cloth_categorys.img as image')->get();

    $price = pricing::where('tailor_id', auth()->user()->id)->pluck('category_id')->all();
$cloth_categorys = cloth_categorys::whereNotIn('id', $price)->select('name','id','cloth_categorys.img as image')->get();
   // dd($p);  
  return view('portal.tailor.pricing.index',compact('users','cloth_categorys','pricing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcategory(Request $request)
    {
       // dd($request->category);
              $c= count($request->category);
                 for ($i=0; $i < $c; $i++) { 
$Added =pricing::insert(
     array(
            'tailor_id' => Auth()->user()->id,
            'category_id' => $request->category[$i],            
            'created_at' =>  date('Y-m-d H:i:s'),

         )
    );
        }
return redirect()->back()->with('message','Category Add Successfully'); ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function set_price(Request $request)
    {
       // dd($request->price , $request->name);

            $c= count($request->price);
                 for ($i=0; $i < $c; $i++) { 
$Added =pricing::where('category_id', $request->id[$i])->where('tailor_id', auth()->user()->id)->update(
     array(
            
            'price' => $request->price[$i],            
            'updated_at' =>  date('Y-m-d H:i:s'),

         )
    );
        }
return redirect()->back()->with('message','Price Add Successfully'); ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function delete_price_category($id)
    {
         $id = DB::delete('delete from pricings where id = ?',[$id]);

    
     return redirect()->back()->with('message','Price Deleted Successfully'); ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function edit(pricing $pricing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pricing $pricing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function destroy(pricing $pricing)
    {
        //
    }
}
