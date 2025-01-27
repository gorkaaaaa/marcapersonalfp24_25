<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_ciclos', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ciclo_id');

            $table->primary(['user_id', 'ciclo_id']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_ciclos', function (Blueprint $table) {
            $table->dropForeign('users_ciclos_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('users_ciclos_ciclo_id_foreign');
            $table->dropColumn('ciclo_id');
        });
    }
};
