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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('description', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->unsignedInteger('parent')->default(0);
            $table->unsignedInteger('author_id')->default(0);
            $table->string('cover', 255)->nullable();
            $table->longText('content')->nullable();
            $table->enum('type', ['post', 'page'])->default('post');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
