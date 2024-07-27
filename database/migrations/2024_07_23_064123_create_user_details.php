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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('u_id')->unique();
            $table->decimal('current_balance')->default(0);
            $table->decimal('total_earning')->default(0);
            $table->decimal('ref_bonus')->default(0);
            $table->boolean('status')->default(0);
            $table->string('ref_code');
            $table->string('img');
            $table->foreign('u_id')->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
