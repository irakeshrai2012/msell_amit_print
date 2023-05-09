<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessModule extends Model
{
    //

    public function get_role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

    public function get_module()
    {
        return $this->belongsTo('App\Module', 'module_id', 'id');
    }


}
