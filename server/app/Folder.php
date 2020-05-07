<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{

    protected $casts = [
        'id' => 'int' ,
        'title' => 'string',
        'user_id' => 'int',
    ];

    public function tasks()
    {
        return $this->hasMany("App\Task");
    }
}
