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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('topic_id')->nullable();
            $table->string('tile',1000);
            $table->string('slug',1000);
            $table->mediumText('detail');
            $table->string('image',1000);
            $table->string('type',100)->post();
            $table->string('description',255)->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('update_by')->nullable();
            $table->tinyInteger('status')->nullable(2);
            $table->date('created_at');
            $table->date('update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
