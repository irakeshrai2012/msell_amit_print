<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerType extends Model
{
  protected $fillable = [
    'name',
    'status'
  ];
}
