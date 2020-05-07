<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $casts = [
        'id' => 'int' ,
        'folder_id' => 'int',
        'title' => 'string',
        'status' => 'int',
        'due_date' => 'date',
    ];

    const STATUS = [
        1 => "未着手",
        2 => "着手中",
        3 => "完了",
    ];

    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        return isset(self::STATUS[$status]) ? self::STATUS[$status] : "";
    }

    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat("Y-m-d", $this->attributes['due_date'])->format("Y/m/d");
    }
}
