<?php use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceColumnToAdsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
/* ---------------------------------------------------------Precios----------------------------------------------------------- */
        Schema::table('ads', function (Blueprint $table) 
            {
                $table->decimal('price', 15, 2);
            });
    }
/* ---------------------------------------------------------Precios----------------------------------------------------------- */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
/* ---------------------------------------------------------Precios----------------------------------------------------------- */
        Schema::table('ads', function (Blueprint $table) 
            {
                $table->dropColumn('price');
            });
    }
/* ---------------------------------------------------------Precios----------------------------------------------------------- */

}
