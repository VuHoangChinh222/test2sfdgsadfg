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
        Schema::create('brand', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('slub',1000)->nullable();
            $table->string('image',1000)->nullable();
            $table->unsignedInteger('sort_order',)->default(0);
            $table->string('description')->nullable();
            $table->unsignedInteger('created_by',);
            $table->unsignedInteger('update_by',)->nullable();
            $table->unsignedTinyInteger('status',)->default(2);
            $table->date('created_at');
            $table->date('update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand');
    }
};
