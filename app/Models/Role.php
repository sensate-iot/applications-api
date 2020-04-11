<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "Roles";
    protected $primaryKey = "id";

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}