<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Auth;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    
    public $timestamps = false;
    protected $fillable = [
        'transaction_id',
        'amount',
        'user_id',
        'flag',
        'created_at',
        'addon_ref'
        ];

    public static function wallet_balance(){
        $usr = Auth::user();
        if(empty($usr)){
            $balance = 0;
        }
        else{
            $query = self::where('user_id' , $usr->id)
                           ->groupBy('user_id')
                           ->SelectRaw('SUM(amount) as bal')
                           ->first();
            $balance = !empty($query->bal) ? $query->bal : 0; 
        }
        return $balance;
    }
}
