<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name', 'price', 'description', 'photo', 'slug', 'short_desc', 'type'];

    public function details() {
        return $this->hasMany(details::class);
    }
}
