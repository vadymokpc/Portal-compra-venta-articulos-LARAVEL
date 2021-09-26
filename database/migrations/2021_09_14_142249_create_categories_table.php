<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $categories = [
            'Coches', 'Motos', 'Electrodomésticos', 'Libros', 
            'Videojuegos', 'Deporte', 'Consolas', 'Moviles', 'Hogar y jardin', 'Ropa'
        ];
        foreach ($categories as $category) {
            $c = new Category();
            $c->name = $category;
            $c->save();
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}