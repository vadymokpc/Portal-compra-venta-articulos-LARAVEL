<?php

namespace App\Models;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public function ads()
        {
            return $this->hasMany(Ad::class); // relacion a varios 1 a n
        }
}
