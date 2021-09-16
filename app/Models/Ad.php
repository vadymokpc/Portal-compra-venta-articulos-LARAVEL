<?php namespace App\Models;


use App\Models\Ad;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model {
    use HasFactory;
/* --------------------------------------------------Visualizar categoria  por cada tarjeta en home----------------------- */
    public function category() {
        return $this->belongsTo(Category::class); // relacion a varios 1 a n
    }
/* --------------------------------------------------Visualizar categoria  por cada tarjeta en home----------------------- */

   /* --------------------------------------------------Visualizar usuario por cada tarjeta en home----------------------- */
    public function user() {
        return $this->belongsTo(User::class);
    }

   /* --------------------------------------------------Visualizar usuario por cada tarjeta en home----------------------- */

   static public function ToBeRevisionedCount()
   {
       return Ad::where('is_accepted', null)->count();
   }
}
