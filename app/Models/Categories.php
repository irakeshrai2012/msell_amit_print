<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';

    static function pluckactives(){
    	return self::where('status' , 1)
    			   ->pluck('name' , 'id')
    			   ->toArray();
    }
    static function pluckall(){
    	return self::pluck('name' , 'id')
    			   ->toArray();
    }
    static function  updatechild($id){
        $childs  = self::where('parent' , $id)
                       ->pluck('name' , 'id')
                       ->toArray();
        if(!empty($childs)){
            $json  =  json_encode($childs);
        }
        else{
            $json = NULL;
        }
        $update = self::where('id', $id)
                      ->update([
                        'childs' => $json
                      ]); 
        return true;
    }
}
