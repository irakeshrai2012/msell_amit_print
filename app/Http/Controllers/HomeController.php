<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductUploadables;
use App\Models\Categories;
use App\Models\Transactions;
use Session;
use Auth;

class HomeController extends Controller
{
	public function index(Request $request){
		// dd(Session::get('cart'));

		//dd(config('app.name'));
		$products = Products::get();
		//dd($products);
		$parent_catg = Categories::whereNull('parent')->get();
        if(!empty(Session::get('is_placing_order'))){
            $order = Session::get('order');
            
        $order_product = $order['product'];
        $prod_uploads = ProductUploadables::where('product_id' , $order_product)->get();
        return view('order.upload_prod_details' , ['order' => $order , 'uploadables' => $prod_uploads]);            
        }							
		return view('index' , [
			'products'    => $products,
			'parent_catg' => $parent_catg,
		]);
	}
	public function add_to_cart(Request $request){
		if(isset($request->product)){
			$product  = Products::find($request->product);
			$session_arr = Session::get('cart');
			if(!empty($product)){

				if(empty($session_arr)){
					Session::put('cart' , []);      // creating cart if not exists
					$arr  = [
						'id' => $product->id,
						'name' => !empty($product->name) ? $product->name : '',
						'price' => !empty($product->price) ? $product->price  : '',
						'image' => !empty($product->image_name) ? $product->image_name : '',
						'quantity' => 1 
					];				
					Session::push('cart'  ,  $arr);
				}
				else{
					$new_arr = []; 
					$found = 0;
					$index = 0;
					foreach ($session_arr as $key => $value) {
						if($value['id'] == $product->id){
							$found = 1;
							$new_arr[]  = [
								'id' => $value['id'],
								'name' => $value['name'],
								'price' => ($value['quantity'] +1)*$value['price'],
								'image' => $value['image'],
								'quantity' => $value['quantity'] +1 
							];
						}
						else{
							$new_arr[]  = $value;
						}
						$index = $key;
					}
					if($found == 0){
						$new_arr[$index + 1] = [
							'id' => $product->id,
							'name' => !empty($product->name) ? $product->name : '',
							'price' => !empty($product->price) ? $product->price  : '',
							'image' => !empty($product->image_name) ? $product->image_name : '',
							'quantity' => 1 							
						];
						// array_push($new_arr, $else_arr);
						// Session::push('cart' , $else_arr);
					}
					Session::forget('cart');
					Session::put('cart' , $new_arr);					
				}
				$res = [
					'res' => 200,
					'arr' => $new_arr
				];
				return response()->json($res);
			}
		}
	}
	public function remove_from_cart(Request $request){
        if(!empty($request->product)){
            $product = $request->product;
            $cartitems = Session::get('cart');
            $new_arr = [];
            foreach($cartitems as $key => $value){
                if($value['id'] != $product){
                    $new_arr[] = $value; 
                }
            }
            dd($new_arr);
        }
	}
}
