<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRevisorToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         /*  ------------------------------------------------------Registrar comando para convertir en revisor cualquier usuario---------------------------------------------------------------------- */
    
        Schema::table('users', function (Blueprint $table) {

            $table->boolean('is_revisor')->default(false);
        });
        /*  ------------------------------------------------------Registrar comando para convertir en revisor cualquier usuario---------------------------------------------------------------------- */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         /*  ------------------------------------------------------Registrar comando para convertir en revisor cualquier usuario---------------------------------------------------------------------- */

        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('is_revisor');
        });
        /*  ------------------------------------------------------Registrar comando para convertir en revisor cualquier usuario---------------------------------------------------------------------- */

    }
}
