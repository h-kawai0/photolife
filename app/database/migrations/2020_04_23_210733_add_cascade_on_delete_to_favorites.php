<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCascadeOnDeleteToFavorites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            DB::statement('DELETE FROM favorites');
            $table->dropForeign('favorites_picture_id_foreign');
            $table->foreign('picture_id')->references('id')->on('pictures')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropForeign('favorites_picture_id_foreign');
            $table->dropForeign('favorites_user_id_foreign');
            $table->foreign('picture_id')->references('id')->on('pictures');
        });
    }
}
