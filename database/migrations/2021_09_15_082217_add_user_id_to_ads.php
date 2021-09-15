<?php use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAds extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
/* --------------------------------------------------Visualizar categoria y usuario por cada tarjeta en home----------------------- */
        Schema::table('ads', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        }
/* --------------------------------------------------Visualizar categoria y usuario por cada tarjeta en home----------------------- */
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
/* --------------------------------------------------Visualizar categoria y usuario por cada tarjeta en home----------------------- */
        Schema::table('ads', function (Blueprint $table) {
                $table->dropForeign('user_id');
                $table->dropColumn('user_id');
            }

        );
    }
/* --------------------------------------------------Visualizar categoria y usuario por cada tarjeta en home----------------------- */    
}
