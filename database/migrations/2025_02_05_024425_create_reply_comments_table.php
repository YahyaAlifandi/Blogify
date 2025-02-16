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
        Schema::create('replay_comment', function (Blueprint $table) {
            $table->id('id_replay_comment');
            $table->unsignedBigInteger('id_comment');
            $table->unsignedBigInteger('id_user');
            $table->text('comment');
            $table->timestamp('tanggal');
            $table->timestamps();

            $table->foreign('id_comment')->references('id_comment')->on('comment')->onDelete('cascade');
            $table->foreign('id_user')->references('id_users')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply_comment');
    }
};
