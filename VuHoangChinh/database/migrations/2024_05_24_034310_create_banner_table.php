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
        Schema::create('banner', function (Blueprint $table) {
            $table->id(); //id
            $table->string('name',1000);
            $table->string('link',1000);
            $table->unsignedInteger('sort_order',)->default(1);
            $table->string('position',50);
            $table->text('description')->nullable();
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('banner');
    }
};
