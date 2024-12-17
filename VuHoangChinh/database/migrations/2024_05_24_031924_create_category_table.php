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
        Schema::create('category', function (Blueprint $table) {
            $table->id(); //id
            $table->string('name',1000);
            $table->string('slub',1000)->nullable();
            $table->string('image',1000)->nullable();
            $table->unsignedInteger('parent_id',)->default(0);
            $table->unsignedInteger('sort_order',)->default(1);
            $table->text('description')->nullable();
            $table->unsignedInteger('created_by',)->default(1);
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
        Schema::dropIfExists('category');
    }
};
