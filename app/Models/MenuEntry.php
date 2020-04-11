<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuEntry extends Model
{
    protected $table = "MenuEntries";
    protected $primaryKey = "id";

    protected $fillable = [
        'ranking', 'display_name'
    ];

    protected $hidden = [
        'id', 'application_id'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function toArray()
    {
        $array = parent::toArray();
        $return = [];

        foreach($array as $key => $value)
        {
            $return[Str::camel($key)] = $value;
        }

        return $return;
    }
}
