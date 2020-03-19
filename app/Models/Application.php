<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "Applications";
    protected $primaryKey = "id";

    public function getRoles()
    {
        return $this->hasMany('App\Models\Role', 'application_id');
    }
}
