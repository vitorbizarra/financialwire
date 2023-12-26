<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('account_id')->references('id')->on('accounts')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('icon');
            $table->string('color');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['account_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
