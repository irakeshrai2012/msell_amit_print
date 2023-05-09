<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\BalanaceAddons;
use App\Models\Transactions;
use App\Models\User;
use Auth;
use DB;
class BalanceController extends Controller
{
    public function __construct(){
        $this->view = 'balance';
    }
    public function add(Request $request){
        return view($this->view.'.create');
    }
    
    public function proceed_payment(Request $request){
        if(!empty($request->amount_payable)){
            $amount = $request->amount_payable;
            return view($this->view.'.payment', compact('amount'));
        }
        else{
            return redirect()->back();
        }
    }


    public function payment(Request $request)
    {        
        $input = $request->all();        
        $api = new Api(env('RAZOR_KEY' , 'rzp_test_V1lnNL2QKXfb2C'), env('RAZOR_SECRET' , 'OLbHNbbKm25CDefAx2qKsP9I'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) 
        {
            try 
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } 
            catch (\Exception $e) 
            {
                return  $e->getMessage();
                //dd('Your Payment Could Not Be Completed');
                return redirect()->back()->with('error','Your Payment Could Not Be Completed');
            }            
        }
        
        $json = [
            'razor_id'           => $response->id,
            'entity'             => $response->entity,
            'amount'             =>  $response->amount/100,
            'currency'           => $response->currency,
            'status'             => $response->status,
            'method'             => $response->method,
            'amount_refunded'    => $response->amount_refunded,
            'vpa'                => $response->vpa,
            'email'              => $response->email,
            'contact'            => $response->contact,
            'fee'                => $response->fee,
            'tax'                => $response->tax,
            'error_code'         => $response->error_code,
            'error_description'  => $response->error_description,
            'error_reason'       => $response->error_reason,
            'rrn'                => $response->acquirer_data->rrn,
            'upi_transaction_id' => $response->acquirer_data->upi_transaction_id,
            'created_at'         => date('Y-m-d H:i:s'  , $response->created_at)
            ];

        $addon_arr = [
                'user_id' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'json_res' => json_encode($json),
                'amount' => $response->amount/100
            ];
        $save = BalanaceAddons::create($addon_arr);
            
    
        $tran_arr = [
                'user_id' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'amount' => $response->amount/100,
                'flag'  => 'C',
                'addon_ref' => $save->id
            ];
        $save_tran  = Transactions::create($tran_arr);
        return redirect('home');
            
        
    }    
    
    
    public function manual_balanace_view(Request $request){
        if(Auth::user()->type!="admin"){
            return redirect()->back()->with('error','You have not permission for this action');

        }else{
            $users = User::orderBy('id' , 'ASC')
                     ->pluck('name' , 'id')
                     ->toArray();
                    
        return view($this->view.'.manual.create' , compact('users'));

        }
        
    }
    
    public function manual_balanace_action(Request $request){
        if(!empty($request->user) && !empty($request->amount)){
            DB::begintransaction();
            $user = $request->user;
            $amount = $request->amount;
            $addon_arr = [
                    'user_id' => $user,
                    'created_at' => date('Y-m-d H:i:s'),
                    'json_res' => NULL,
                    'amount' => $amount
                ];
            $save = BalanaceAddons::create($addon_arr);
                
        
            $tran_arr = [
                    'user_id' => $user,
                    'created_at' => date('Y-m-d H:i:s'),
                    'amount' => $amount,
                    'flag'  => 'C',
                    'addon_ref' => $save->id
                ];
            $save_tran  = Transactions::create($tran_arr);
            
            if($save && $save_tran){
                DB::commit();
            }
            else{
                DB::rollback();
            }
            return redirect()->back();
        }
    }
}
