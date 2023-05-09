<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanaceAddons extends Model
{
    use HasFactory;
    protected $table = 'balance_addons';
    
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'created_at',
        'json_res',
        'amount'
        ];
}
