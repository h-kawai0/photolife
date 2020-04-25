<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCascadeOnDeleteToComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            DB::statement('DELETE FROM comments');
            $table->dropForeign('comments_picture_id_foreign');
            $table->dropForeign('comments_user_id_foreign');
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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_picture_id_foreign');
            $table->dropForeign('comments_user_id_foreign');
            $table->foreign('picture_id')->references('id')->on('pictures');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
