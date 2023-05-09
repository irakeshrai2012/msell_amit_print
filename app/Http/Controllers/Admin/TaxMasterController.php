<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TaxMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
         $this->view = 'admin/masters/tax-master';
     }
    public function index()
    {
        $data = DB::table('tax_master')
                  ->where('status' , 1)
                  ->get();
        return view($this->view.'.index' , [
                'data' => $data
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->tax_per)){
            $insert = [
                    'tax_per' => $request->tax_per,
                    'status'  => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'description' =>!empty($request->description) ? $request->description : NULL,
                ];
                
            $insert = DB::table('tax_master')
                        ->insert($insert);
            if($insert){
                return redirect('Tax-Master');
            }
            else{
                return redirect()->back();
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
        //
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
        $entry = DB::table('tax_master')
                   ->where('id' , $now_id)
                   ->first();
                   
        return view($this->view.'.edit',[
            'data' => $entry
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
        $update_arr = [
                            'tax_per'     => $request->tax_per,
                            'description' => !empty($request->description) ? $request->description : NULL,
                            'status'      => 1            
            ];
        $update = DB::table('tax_master')
                    ->where('id' , $now_id)
                    ->update($update_arr);
        return redirect('Tax-Master');

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
        
        $delete = DB::table('tax_master')
                    ->where('id' , $now_id)
                    ->update([
                        'status' => 0
                        ]);
        return redirect('Tax-Master');
    }
}
