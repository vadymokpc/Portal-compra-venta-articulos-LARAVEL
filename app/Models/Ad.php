<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model

{
    use HasFactory;
    public function category()
{
    return $this->belongsTo(Category::class); // relacion a varios 1 a n
}
}
