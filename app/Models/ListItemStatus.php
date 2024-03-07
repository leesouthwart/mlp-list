<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListItemStatus extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
    ];

    CONST PENDING = 1;
    CONST COMPLETE = 2;
    CONST DELETED = 3;

    public function listItems()
    {
        return $this->hasMany(ListItem::class);
    }
}
