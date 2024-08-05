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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('u_id');
            $table->string('bank_type');
            $table->string('bank_name')->nullable();
            $table->string('bank_acc_title')->nullable();
            $table->string('bank_acc_number')->nullable();
            $table->foreign('u_id')->references('id')->on('users')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_details');
    }
};
