<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['name', 'email', 'tel_no'];

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'id', 'details_id');
    }
}
