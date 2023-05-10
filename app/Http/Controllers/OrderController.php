<?php

namespace App\Http\Controllers;
use App\Models\ProductUploadables;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Transactions;
use Validator;
use Session;
use Auth;
use DB;
use App\Models\Order;
use Storage;
use ZipArchive;
class OrderController extends Controller
{
    public function submithandler(Request $request){
        $order = $request->except('_token' , 'order_name');
        $order['user_id'] = Auth::user()->id;
        Session::put('order' , $order);
        $order['name'] = $request->order_name;
        if(empty(Auth::user())){
            Session::put('is_placing_order' , 1);
            return redirect('register');
        }
        $rand_str = 'qwertyuioplkmkjhgfdsaaaaaazxcvbnmm1234567890poiuytrewqsdfghjuytfdxccvb';
        $ref = substr(str_shuffle($rand_str) , '0' , 6 ).strtotime(date('YmdHis'));
        $order_product = $order['product_id'];
        $order['reference'] = $ref;
        $order['created_at'] = date('Y-m-d H:i:s');
        $insert = Order::insert($order);
        $inserted_prod = Order::orderBy('id' , 'desc')->first();
        $prod_uploads = ProductUploadables::where('product_id' , $order_product)
                                          ->get();
        if($insert){
        return view('order.upload_prod_details' , ['order' => $inserted_prod , 'uploadables' => $prod_uploads]);
        }
    }
    public function fileupload(Request $request){
        if(!empty($request->uploadable_id) && !empty($request->file) && !empty($request->order_id)){
            $uplodable = ProductUploadables::where('id' , $request->uploadable_id)
                                           ->first();
            if($uplodable->type == 'pdf'){
                $mimes = 'mimes:pdf';
                $mime_label = 'PDF';
            }
            else{
                $mimes = 'mimes:jpg,jpeg,png';
                $mime_label = 'JPG , JPEG , PNG';
            }
            
            if(empty($uploadble->size)){
            $validate = Validator::make($request->all() , ['file' => $mimes]);
            }
            else{
                $maxsize = $uplodable->size;
              
                $validate = Validator::make($request->all() , ['file'=>$mimes , 'file' => 'max:'.$maxsize]);
            }
            if($validate->fails()){
              return response()->json(['res' => 500 , 'msg' => 'only '.$mime_label .' Type Files are supported']);  
            }
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file_name=str_replace(' ' , '',$file_name);
            $path = 'order-images/';
            $final_file_name = date('YmdHis').'-'.$file_name;
            $file->move($path, $final_file_name);

            $insert_arr['image_name'] = $path.$final_file_name;    
            if(is_file($path.$final_file_name)){
                $new_upload_arr = [];
                $order = Order::where('id' , $request->order_id)->first();
                $json = $order->uploads;
                if(!empty($json)){
                    $arr = json_decode($json);
                    if(!empty($arr)){
                        foreach($arr as $key => $value){
                            $new_upload_arr[] = $value;       
                        }
                        array_push( $new_upload_arr , $path.$final_file_name);
                    }
                    else{
                        $new_upload_arr = [$path.$final_file_name];
                    }
                }
                else{
                        $new_upload_arr = [$path.$final_file_name];                    
                }
                
                $update_uploads  = Order::where('id' , $request->order_id)
                                        ->update(['uploads' => json_encode($new_upload_arr)]);
            }
        
        }
        else{
            return response()->json(['res' => 500 , 'msg' => 'Please Upload the File First']);
        }
        if(is_file(public_path().'/'.$path.$final_file_name)){
            return response()->json(['res' => 200 , 'path' => asset($path.$final_file_name) , 'storable_path' => $path.$final_file_name]);
        }
        else{
            return response()->json(['res'=>500 , 'msg' => 'failed to store File']);
        }
    }
    public function place_order(Request $request){
        return redirect('custumer_orders');
        Session::forget('is_placing_order');
        $order = Session::get('order');
        $insert_arr = [
            'user_id' => Auth::user()->id,
            'name' => !empty($order['name']) ? $order['name'] : NULL,
            'product_id' => $order['product'],
            'quantity' => $order['quantity'],
            'upload_file' => $order['upload_file'],
            'remark'      => $order['remark']    
            ];
            $insert = Order::insert($insert_arr);
            Session::forget('order');
            if($insert){
                return redirect('home');
            }
            else{
                return redirect()->back();
            }
    } 
    
    public function custumer_order_view(Request $request){
        $user = Auth::user();
        $orders = Order::where('created_by' , $user->id)
                      ->where('is_submitted' , 1)
                       ->orderBy('id', 'DESC')
                       ->get();
        $all_product = Products::where('status',1)
                               ->pluck('name' , 'id')
                               ->toArray();
        return view('order.custumer_order' , ['orders' => $orders  , 'products' => $all_product]);
        
        
    }
    public function show(Request $request , $id){
        $now_id = decrypt($id);

        $order = Order::where('id' , $now_id)
                      ->first();
        $details = DB::table('order_details')
                        ->where('order_id' , $now_id)
                        ->get();
        $products = Products::where('status',1)
                               ->pluck('name' , 'id')
                               ->toArray();                        
        if(Auth::user()->type == 'admin'){
            $showform = 1;
        }
        else{
            $showform = 0;
        }                        

        return view('order.view' , compact('order' , 'details' , 'showform' , 'products'));
        // $details = Order::join('products' , 'custumer_orders.product_id' , '=' , 'products.id')
        //                 ->where('custumer_orders.id' , $now_id)
        //                 ->select('custumer_orders.*' , 'products.name as prod_name' , 'products.price as price' , 'products.tax as tax')
        //                 ->first();

        // $images = [];
        // if(!empty($details->uploads)){
        //     $images = json_decode($details->uploads);
        // }

        // if(Auth::user()->type == 'admin'){
        //     $howform = 1;
        // }
        // else{
        //     $howform = 0;
        // }
        // if(!empty($details)){
        //     return view('order.view' ,['data'=> $details , 'images' => $images, 'showform' => $howform]);
        // }
    }
    public function update_stage(Request $request , $id){
        $update = Order::where('id' , $id)
                      ->update(['stage' => $request->stage]);
        if($update){
            return redirect()->back();
        }
    }


    public function update_product(Request $request , $id){
        // $update = Order::where('id' , $id)
        //               ->update(['stage' => $request->stage]);

         $update = DB::table('order_details')
                                ->where('id' , $id)
                                ->update([
                                    'status' => $request->status
                                    ]);
                                    
                                    
        if($update){
            return redirect()->back();
        }
    }
    
    public function add_order_new(Request $request){
        if(empty($request->product) || empty($request->qty)){
            return response()->json(false);
        }
        if(!empty($request->order_id)){
            DB::begintransaction();
            $product = $request->product;
            $qty = $request->qty;
            
            $product = Products::where('id' , $request->product)
                               ->first();
                               
            $tax = $product->tax;
            $price = $product->price;
            $amount = $price*$qty;
            
            $tax_val = ($amount*$tax)/100;

            $wallet_balance = Transactions::wallet_balance();
            if($wallet_balance){
                if($wallet_balance < ($tax_val + $amount)){
                    DB::rollback();
                    return response()->json(['res' => 400 , 'msg' => 'Insufficient Wallet Balance']);
                }
            }
            else{
                DB::rollback();
                    return response()->json(['res' => 400 , 'msg' => 'Insufficient Wallet Balance']);
            }

            $details_insert = DB::table('order_details')
                                ->insert([
                                    'order_id' => $request->order_id,
                                    'product_id' => $product->id,
                                    'price'      => $product->price,
                                    'tax'        => $product->tax,
                                    'amount_without_tax' => $amount,
                                    'quantity'     => $qty,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'created_by' => Auth::user()->id
                                    ]);
                                    
            if( $details_insert){
                if(!empty($tax)){
                $amt_after_tax = $amount + (($amount*$tax)/100);                     
                }
                else{
                $amt_after_tax   = $amount;
                }                 
                DB::commit();
                $arr = [
                        'name' => $product->name,
                        'qty' => $qty,
                        'rate' => $product->price,
                        'amount' => $amount,
                        'tax'    => !empty($tax) ? $tax : ''                        
                        
                    ];
                return response()->json(['res' => 200 ,'data' => $arr , 'order_id' => $request->order_id]);            
            }
            else{
                DB::rollback();
            }
        }
        else{
            DB::begintransaction();
            $order_insert = DB::table('order')
                              ->insert([
                                  'remarks' => NULL,
                                  'created_at' => date('Y-m-d H:i:s'),
                                  'created_by' => Auth::user()->id
                                  ]);
            $order_inserted = DB::table('order')->orderBy('id' , 'DESC')->first();
            $product = $request->product;
            $qty = $request->qty;
            
            $product = Products::where('id' , $request->product)
                               ->first();

            $tax = $product->tax;
            $price = $product->price;
            $amount = $price*$qty;
            
            $tax_val = ($amount*$tax)/100;

            $wallet_balance = Transactions::wallet_balance();
            if($wallet_balance){
                if($wallet_balance < ($tax_val + $amount)){
                    DB::rollback();
                    return response()->json(['res' => 400 , 'msg' => 'Insufficient Wallet Balance']);
                }
            }
            else{
                DB::rollback();
                    return response()->json(['res' => 400 , 'msg' => 'Insufficient Wallet Balance']);
            }
            
            $details_insert = DB::table('order_details')
                                ->insert([
                                    'order_id' => $order_inserted->id,
                                    'product_id' => $product->id,
                                    'price'      => $product->price,
                                    'tax'        => $product->tax,
                                    'amount_without_tax' => $amount,
                                    'quantity'     => $qty,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'created_by' => Auth::user()->id
                                    ]);
                                             
            if($order_insert && $details_insert){
                if(!empty($tax)){
                $amt_after_tax = $amount + (($amount*$tax)/100);                     
                }
                else{
                $amt_after_tax   = $amount;
                } 
                DB::commit();
                $arr = [
                        'name' => $product->name,
                        'qty' => $qty,
                        'rate' => $product->price,
                        'amount' => $amt_after_tax,
                        'tax'    => !empty($tax) ? $tax : ''
                    ];
                return response()->json(['res' => 200 ,'data' => $arr , 'order_id' => $order_inserted->id]);
            }
            else{
                DB::rollback();
            }
        }
    }


    public function submit_order_new(request $request){
        //dd($request->all());
        $validatedData = $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,cdr|max:2048'
        ]);

        $images=[];

        $folder = public_path('customers/products/');
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }

        
        foreach ($request->file('images') as $image) {
            //dd($image->getClientOriginalName());
            $fileName = 'customer-'.$image->getClientOriginalName().'-'.time().'.'.$image->getClientOriginalExtension();
            $image->move($folder, $fileName);  
            //$url = Storage::url($path);

            // Store the image path in the database
            $images[]=$fileName;
            //Image::create(['path' => $url]);
        }

        //dd(json_encode($images));
        if(!empty($request->order_id)){

            $order_id = $request->order_id;
            $party = $request->party_name;
            $remark = $request->remark;

            $order = Order::where('id' , $order_id) 
                              ->first();
            $details = DB::table('order_details')
                             ->where('order_id' , $order_id)
                             ->get();



            $order_update_arr =  [
                'remarks' => $remark,
                'party_name'   => $party
            ];
            $amount_without_tax = 0;
            $order_value = 0;
            $order_quantity = 0;
            $tax = 0;
            foreach ($details as $key => $value) {
                $amount_without_tax += $value->amount_without_tax;
                $tax += !empty($value->tax) ? ($value->amount_without_tax*$value->tax)/100 : 0;
                $tax_temp = !empty($value->tax) ? ($value->amount_without_tax*$value->tax)/100 : 0;
                $order_value += $value->amount_without_tax + $tax_temp;
                $order_quantity += $value->quantity;
            }
            $order_update_arr['amount_without_tax'] = $amount_without_tax;
            $order_update_arr['tax'] = $tax;
            $order_update_arr['value'] = $order_value;
            $order_update_arr['quantity']  = $order_quantity;
            $order_update_arr['is_submitted'] = 1;
            $order_update_arr['reference'] = date('YmdHis').$order_id;
            $order_update_arr['product_images'] =json_encode($images);

            $update = Order::where('id' , $order_id)->update($order_update_arr);


            if($update){
                return redirect('Checkout/'.encrypt($order_id));
                return redirect('custumer_orders');
            }
        }
    }

    public function approve_order(Request $request , $id){
        $now_id  = decrypt($id);
        $update   = Order::where('id' , $now_id) 
                         ->update(['approved' => 1]);
        $order_obj = Order::where('id' , $now_id)
                        ->first();
        $tran_arr = [
            'transaction_id' => $order_obj->reference,
            'amount'         => ($order_obj->value - 2*$order_obj->value),
            'user_id'        => $order_obj->created_by,
            'flag'           => 'D',
            'created_at'     => date('Y-m-d H:i:s')
        ];  

        $transaction_insert = Transactions::insert($tran_arr);
                        
        if($update){
            return redirect()->back();
        }
    }
    public function Checkout(Request  $request , $order_id){
        $order_id = decrypt($order_id);
        return redirect()->back();
        //dd($order_id);
    }
    
    public function download(Request $request)
    {
    $filePaths = $request->input('files');
    //dd($filePaths);

    foreach ($filePaths as $filePath) {
        $filePaths[] = public_path("customers/products/".$filePath);  
    }


    // Create a new zip archive and add the files to it
    $zip = new \ZipArchive;
    $zipName = 'files.zip';
    $zip->open(public_path($zipName), ZipArchive::CREATE);
    foreach ($filePaths as $path) {
        $fileName = basename($path);
        $zip->addFile($path, $fileName);
    }
    $zip->close();

    // Send the zip file to the user's browser for download
    return response()->download(public_path($zipName));

    } 
}
