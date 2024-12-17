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
        Schema::create('topic', function (Blueprint $table) {
            $table->id(); //id
            $table->string('name',1000);
            $table->string('slug',1000);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('topic');
    }
};
