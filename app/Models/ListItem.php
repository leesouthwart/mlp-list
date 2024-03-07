<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    public $fillable = [
        'name',
        'list_item_status_id',
    ];

    public function status()
    {
        return $this->belongsTo(ListItemStatus::class, 'list_item_status_id');
    }
}
