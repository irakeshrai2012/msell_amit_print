<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddresses;
use App\Models\Order;
use App\Models\Transactions;
use Session;
use Auth;
use DB;

class CheckoutController extends Controller
{
	public function __construct(){
		$this->view = 'checkout';
		$this->url = 'checkout';
	}

    //old code 
    // public function index(Request $request){
    //     $user  =  Auth::user();
    //     if(empty($user)){
    //         return redirect('login');
    //     }

    // 	$cart  = Session::get('cart');
    //     $total = 0;
    //     foreach ($cart as $key => $value) {
    //         $total += !empty($value['price']) ? $value['price'] : 0;
    //     }
    //     $adresses = UserAddresses::where('user_id' , $user->id)
    //                              ->selectRaw("id , CONCAT_WS(', ' , locality , city , state) AS addr")
    //                              ->get();

    // 	return view($this->view.'.index' , [
    // 		'data'    => $cart,
    //         'address' => $adresses,
    //         'total'   => $total
    // 	]);
        
    // }
    //olde code ends

    public function checkout(Request $request ,$id){
        $order_id = decrypt($id);
        $order = Order::where('id' , $order_id)->first();
        $user=Auth::user();

        $address=new  UserAddresses;
        //$address=UserAddresses::where('user_id', $user->id)->first();
        return view($this->view.'.checkout' , compact('order','user','address'));
    }
    public function checkout_action(Request $request , $order_id){
        $order_id = decrypt($order_id);
        $order_obj = Order::where('id' , $order_id)->first();
        $wallet_balance = Transactions::wallet_balance();

        if(empty($wallet_balance)){
            $wallet_balance = 0;
        }

        if($order_obj->value > $wallet_balance){

            return redirect()->back()->with('error','Your Wallet Balance Is  Not Enough To Proceed');
            //dd('Your Wallet Balance Is  Not Enough To Proceed');
        }
        if(empty($order_obj)){
            return redirect()->back()->with('error','No Order Found');
            //dd('No Order Found');
        }

        $udpate_arr = [
            'shipping_information' => json_encode($request->shipping),
            'checkout'             => 1
        ];

        DB::begintransaction();
        $update_order = Order::where('id' , $order_id)
                             ->update($udpate_arr);

        if($update_order){
            DB::commit();
            return redirect('custumer_orders');
        }
        else{

            return redirect()->back()->with('error','Something went Wrong ! Try Again Later');
            //dd('Something went Wrong ! Try Again Later');
        }
    }
}
