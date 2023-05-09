<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductUploadables;
use Validator;
use DB;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');  
        $this->view = 'admin/masters/product';
        $this->url = 'products';
        $this->frontend  = 'products';
    }
    public function index()
    {
        $data = Products::where('status' , 1)
                        ->get();
        $categories = Categories::pluckall();

        return view($this->view.'.index' , [
            'data'       => $data,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::pluckactives();
        $taxes = DB::table('tax_master')
                  ->where('status' , 1)
                  ->get();

         //dd($taxes);         
        return view($this->view.'.create' , [
            'categories' => $categories,
            'taxes'=>$taxes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::begintransaction();   
        $insert_arr = [
            'name'             => $request->name,
            'price'            => $request->price,
            'category'         => $request->category,
            'dispatch_days'    => $request->dispatch_days,
            'tax'              => $request->tax,
            'email_charge'     => $request->email_charge,
            'min_pur_quantity' => $request->min_quantity,
            'created_at'       => date('Y-m-d h:i:s'),
            'created_by'       => Auth::user()->id
        ];
        
        if(!empty($request->product_images)){
            $product_images_raw = $request->product_images;
            $product_arr = explode(',' , $product_images_raw);
            $insert_arr['image_name'] = $product_arr[0];
            $insert_arr['product_images_json'] = json_encode($product_arr);
        }        
        $bool2 = Products::insert($insert_arr);
        
        $inserted = Products::orderBy('id' , 'desc')
                            ->first();
                            
        if(!empty($request->uploadable_type)){
            $types = $request->uploadable_type;
            $names = $request->uploadable_name;
            $sizes = $request->file_size;
            
            $uploadable_insert = [];
            foreach($types as $key => $value){
                
                $uploadable_insert[$key] =[
                            'product_id' => $inserted->id,
                            'type' => $value,
                            'name' => !empty($names[$key]) ? $names[$key] : NULL,
                            'size' => !empty($sizes[$key]) ? $sizes[$key] : 100
                                    ];    
            }
            $bool1 = ProductUploadables::insert($uploadable_insert);
        }
        else{
            $bool1 = true;
        }

        
        if($bool1 && $bool2){
            DB::commit();
            return redirect($this->url)->with('success' , 'Saved SuccessFully');
        }
        else{
            DB::rollback();
            return redirect()->back()->with('error' , 'Could Not Store');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $now_id = decrypt($id);

        $entry = Products::where('id' , $now_id)
                            ->first();

        $categories =  Categories::where('status' , 1)
                                 ->pluck('name' , 'id')
                                 ->toarray();

        $taxes = DB::table('tax_master')
                  ->where('status' , 1)
                  ->get();


        return view($this->view.'.show' , [
            'data' => $entry,
            'categories' => $categories,
            'taxes'=>$taxes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $now_id = decrypt($id);
        $entry = Products::where('id' , $now_id)->first();
        $taxes = DB::table('tax_master')->where('status', 1)->get();
        $categories = Categories::where('status' , 1)->pluck('name' , 'id') ->toarray();
        return view($this->view.'.edit' , ['data' => $entry,'categories' => $categories,'taxes'=>$taxes ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $id = decrypt($id);
        DB::begintransaction();   
        $insert_arr = [
            'name'             => $request->name,
            'price'            => $request->price,
            'category'         => $request->category,
            'dispatch_days'    => $request->dispatch_days,
            'tax'              => $request->tax,
            'email_charge'     => $request->email_charge,
            'min_pur_quantity' => $request->min_quantity,
            'created_at'       => date('Y-m-d h:i:s'),
            'created_by'       => Auth::user()->id
        ];
        
        if(!empty($request->product_images)){
            $product_images_raw = $request->product_images;
            $product_arr = explode(',' , $product_images_raw);
            $insert_arr['image_name'] = $product_arr[0];
            $insert_arr['product_images_json'] = json_encode($product_arr);
        }        
        $bool2 = Products::where('id',$id)->update($insert_arr);
        $inserted = Products::where('id',$id) ->first();
                            
        if(!empty($request->uploadable_type)){
            $types = $request->uploadable_type;
            $names = $request->uploadable_name;
            $sizes = $request->file_size;
            
            $uploadable_insert = [];
            foreach($types as $key => $value){
                
                $uploadable_insert[$key] =[
                            'product_id' => $inserted->id,
                            'type' => $value,
                            'name' => !empty($names[$key]) ? $names[$key] : NULL,
                            'size' => !empty($sizes[$key]) ? $sizes[$key] : 100
                                    ];    
            }
            $bool1 = ProductUploadables::insert($uploadable_insert);
        }
        else{
            $bool1 = true;
        }

        
        if($bool1 && $bool2){
            DB::commit();
            return redirect($this->url)->with('success' , 'Saved SuccessFully');
        }
        else{
            DB::rollback();
            return redirect()->back()->with('error' , 'Could Not Store');
        }
        



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $now_id = decrypt($id);
        $post = Products::where('id' , $now_id)->first();
        $post->delete();
        return redirect()->route('products.index')->with('success' , 'Product are deleted SuccessFully');;
    }
    public function handleview(Request $request , $slug){
        $now_id = decrypt($slug);

        $entry = Products::find($now_id);

        if(!empty($entry)){
            return view($this->frontend.'.details' , [
                'data' => $entry
            ]);
        } 
    }
    public function get_product_order_view(Request $request){
        $category_productsraw = Products::join('categories' , 'categories.id' , '=' , 'products.category')
                                     ->select('products.*' , 'categories.id as catg_id'  , 'categories.name as catg_name')
                                     ->where('categories.id' , $request->category);
                                     
        if(!empty($request->product)){
            $category_productsraw->where('products.id' , $request->product);    
        }                 
        
        $category_products = $category_productsraw->first();
        
        $all_products = Products::join('categories' , 'categories.id' , '=' , 'products.category')
                                     ->select('products.*' , 'categories.id as catg_id'  , 'categories.name as catg_name')
                                     ->where('categories.id' , $request->category)
                                     ->pluck('products.name' , 'products.id');                                     
        return view('products.product_details-ajax' , [
            'product' => $category_products,
            'all_products' => $all_products
        ]);
    } 
    public function image_upload(Request $request){
        if(!empty($request->image)){
            $validate = Validator::make($request->all() , ['image' => 'mimes:jpg,jpeg,png']);
            if($validate->fails()){
              return response()->json(['res' => 500 , 'msg' => 'only Jpeg , Jpg , PNG Files are supported']);  
            }
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file_name=str_replace(' ' , '',$file_name);
            $path = 'product-images/';
            $final_file_name = date('YmdHis').'-'.$file_name;
            $file->move($path, $final_file_name);
            $insert_arr['image_name'] = $path.$final_file_name;        
        
        }
        if(is_file(public_path().'/'.$path.$final_file_name)){
            return response()->json(['res' => 200 , 'path' => asset($path.$final_file_name) , 'storable_path' => $path.$final_file_name]);
        }
        else{
            return response()->json(['res'=>500 , 'msg' => 'failed to store File']);
        }
    }
    public function getdetails_ajax(Request $request){
        $product = Products::where('id' , $request->product)->first();
        $image = $product->image_name;
        $url = asset($image);
        $product->image_full_url = $url;
        if(!empty($product)){
            return response()->json($product);
        }
    }
}
