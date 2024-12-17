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
        Schema::create('user', function (Blueprint $table) {
            $table->id(); //id
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('username');
            $table->string('password');
            $table->string('address');
            $table->string('imgage');
            $table->string('role',50)->default('customer');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('update_by',)->nullable();
            $table->date('created_at');
            $table->date('update_at')->nullable();
            $table->unsignedTinyInteger('status',)->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
