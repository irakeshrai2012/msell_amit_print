<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->view = 'admin/masters/categories';
        $this->table = 'categories';
        $this->heirarchy = 'category/heirarchy';    //frontend
    }
    public function index(Request $request)
    {
        $data = Categories::where('status' , 1)
                          ->get();   
        $pluck = Categories::pluckall();
        return view($this->view.'.index' , [
            'data'  => $data,
            'pluck' => $pluck
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Categories::where('status' , 1)
                                 ->pluck('name' , 'id')
                                 ->toarray();
        return view($this->view.'.create' , [
            'categories' => $categories
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
        if(!empty($request->name)){
            $insert_arr = [
                'name'       => $request->name , 
                'desc'       => !empty($request->description) ? $request->description : NULL,
                'parent'     => !empty($request->parent) ? $request->parent : NULL,
                'created_at' => date('Y-m-d h:i:s'),
                'created_by' => Auth::user()->id
            ];

        
            if(!empty($request->image)){
                $file = $request->image;
                $file_name = $file->getClientOriginalName();
                $file_name=str_replace(' ' , '',$file_name);
                $path = 'category-images/';
                $final_file_name = date('YmdHis').'-'.$file_name;
                $file->move($path, $final_file_name);
    
                $insert_arr['image_name'] = $path.$final_file_name;
            }
            $insert = Categories::insert($insert_arr);
            
            if(!empty($request->parent)){
                Categories::updatechild($request->parent);
            }            

            if($insert){
                return redirect('categories')->with('success' , 'Saved SuccessFully');
            } 
            else{
                return redirect()->back()->with('success' , 'Could Not Save');
            }
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

        $entry = Categories::where('id' , $now_id)
                            ->first();

        $categories =  Categories::where('status' , 1)
                                 ->pluck('name' , 'id')
                                 ->toarray();

        return view($this->view.'.show' , [
            'data' => $entry,
            'categories' => $categories
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

        $entry = Categories::where('id' , $now_id)
                            ->first();

        $categories =  Categories::where('status' , 1)
                                 ->pluck('name' , 'id')
                                 ->toarray();

        return view($this->view.'.edit' , [
            'data' => $entry,
            'categories' => $categories
        ]);
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
        $now_id = decrypt($id);

        if(!empty($request->name)){

            $update_arr = [
                                'name' => $request->name,
                                'desc' => !empty($request->description) ? $request->description : NULL,
                                'parent' => !empty($request->parent) ? $request->parent : NULL,
                                'updated_at' => date('Y-m-d h:i:s'),
                                'updated_by' => Auth::user()->id
                            ];
            if(!empty($request->image)){
                $file = $request->image;
                $file_name = $file->getClientOriginalName();
                $file_name=str_replace(' ' , '',$file_name);
                $path = 'category-images/';
                $final_file_name = date('YmdHis').'-'.$file_name;
                $file->move($path, $final_file_name);
    
                $update_arr['image_name'] = $path.$final_file_name;
            }                        
        $update = Categories::where('id' , $now_id)
                            ->update($update_arr);
            if($update){
                return redirect('categories')->with('success' , 'Updated SuccessFully');       
            }
            else{
                return redirect()->back()->with('error' , 'Could not Update');
            }
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
        $post = Categories::find($now_id);
        //dd($post);
        $post->delete();
        return redirect()->route('categories.index');
        
    }
    public function handleview(Request $request , $slug,$type =''){
        $now_id = decrypt($slug);
        //dd($type);
        //dd( $now_id);
        $master_catg = Categories::find($now_id);
         $selected_parent=''; 
         $selected_subcategory='';
        // if($master_catg->parent){
        //     $selected_subcategory = Categories::find($master_catg->parent);

        //     $selected_parent = Categories::find($selected_subcategory->parent);
        // }
        
        $parents=[];
        //$childs=[];
        //$childs  =  Categories::where('parent' , $now_id) ->get();
        $master_of_master=[];

        $childs  =  Categories::whereNull('parent')->where('status' , 1)->pluck('name' ,  'id')->toArray();
        //dd($childs);
        $selected_product='';

        if($type=="category"){

        // serching if it has any product
        $view = $this->heirarchy;
        // $view = 'products/product_details_new';
         $products = Products::where('category' , $now_id)
                             ->where('status' , 1)
                             ->get();


        }else{

         //   $view = $this->heirarchy;
         $view = 'products/product_details_new';
         $selected_product = Products::where('id' , $now_id)
                             ->where('status' , 1)
                             ->first();
         //dd($selected_product->category);  
         
         $master_catg = Categories::find($selected_product->category);


         $products = Products::where('category' , $selected_product->category)
                             ->where('status' , 1)
                             ->get();






            
        }                    

        // if(empty($childs)){

            //$parents  =  Categories::whereNull('parent')->where('status' , 1)->pluck('name' ,  'id')->toArray();
            //$childs  =  Categories::where('parent' , $now_id) ->get();
            // $childs  =  Categories::get();
            // serching if it has any product
            // $view = 'products/product_details_new';
            // $products = Products::where('category' , $now_id)
            //                     ->where('status' , 1)
            //                     ->get();
            //getting sibblings of the category
            // $master_sibblings = Categories::where('parent' , $master_catg->parent)
            //                               ->where('status' , 1)
            //                               ->pluck('name' ,  'id')
            //                               ->toArray();
                                          
            // $master_of_master = Categories::where('id' , $master_catg->parent)
            //                               ->first();
            // dd($master_of_master , $master_catg );
            //getting sibblings of master of master
            // $master_of_master_sibblings = Categories::where('parent' , $master_of_master->parent)
            //                               ->where('status' , 1)
            //                               ->pluck('name' ,  'id')
            //                               ->toArray();            
        // }
        // else{
        //     $view = $this->heirarchy;
        // }
        
        // if(empty($products[0])){
        //     $view = $this->heirarchy;
        // }
        return view($view , [
            'data' => $products,
            'catg' => $master_catg,
            'selected_parent'=>$selected_parent,
            'selected_subcategory'=>$selected_subcategory,
            'selected_product'=>$selected_product?$selected_product:'',
            'id'=>$now_id,
            'parents'=>$childs,
            'master_catg'=>$master_catg,
            'products' => !empty($products) ? $products : [],
            'master_of_master' => !empty($master_of_master)?$master_of_master:[],
            'catg_sibblings' => !empty($master_sibblings) ? $master_sibblings : [],
            'master_catg_sibblings' => !empty($master_of_master_sibblings) ? $master_of_master_sibblings : []
        ]);
    }

    public function script(){
        $all = Categories::get();

        foreach ($all as $key => $value) {
            $childs = Categories::where('parent' , $value->id)
                                ->pluck('name' , 'id')
                                ->toarray();
            if(!empty($childs)){
                $json = json_encode($childs);
            }
            else{
                $json = NULL;
            }
            $update = Categories::where('id' , $value->id)  
                                ->update(['childs' => $json]);
        }
       // dd('done');
    }
    public function get_catg_items(Request $request){

        $master_catg = Categories::find($request->sub_catg); 
        //dd($master_catg);
        $master_sibblings=[];
        if($request->sub_catg){
        $master_sibblings = Categories::where('parent' , $request->sub_catg) ->where('status' , 1)
                                          ->pluck('name' ,  'id')
                                          ->toArray();
        }                                  
        return response()->json(['current'=>$master_catg,'child'=> $master_sibblings]);
        
    }


    public function get_product_items(Request $request){
        $products = Products::where('category' , $request->sub_catg)->where('status' , 1)->pluck('name' ,  'id') ->toArray();                             
        return response()->json(['products'=> $products]);
        
    }
}
