<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "Applications";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'description',
        'hostname',
        'path',
        'protocol'
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
