<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Products;
class CartController extends Controller
{
	public function __construct(){
		$this->view  = 'cartview';
		$this->url   = 'cartview';
	}
    public function index(Request $request){
    	$cart =  !empty(Session::get('cart')) ? Session::get('cart') : [];
    	$country = ['IN' => 'INDIA'];
    	$state = ['DL'=>'Delhi' , 'UP' => 'Uttar Pradesh' , 'HR' => 'Hariyana'];

    	return view($this->view.'.index' , [
    		'data' 	  => $cart,
    		'country' => $country, 
    		'state'   => $state
    	]);
    }
    public function update_cart(Request $request){
        if(!empty($request->cart)){
            $cart =  $request->cart;
            $session_arr = [];
            foreach ($cart as $key => $value) {
                if($value > 0){
                    $prod = Products::where('id', $key) 
                                     ->first();
                    if(!empty($prod)){
                        $session_arr[] = [
                            'id'        => $prod->id,
                            'name'      => $prod->name,
                            'price'     => $prod->price, 
                            'image'     => !empty($prod->image_name) ? $prod->image_name : '' ,
                            'quantity'  => $value
                        ];
                    }
                }
            }
            if(!empty($session_arr)){
                Session::forget('cart');
                Session::put('cart' , $session_arr);
            }            
        }
        return redirect($this->url);
    }
}
