<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
