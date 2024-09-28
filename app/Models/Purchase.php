<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['details_id', 'items_id', 'quantity'];

    public function items()
    {
        return $this->hasOne(Item::class, 'id', 'items_id');
    }
}
