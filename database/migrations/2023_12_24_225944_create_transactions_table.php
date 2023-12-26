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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('transaction_type');
            $table->integer('amount');
            $table->date('date');
            $table->boolean('finished');
            $table->string('description');
            $table->foreignUuid('account_id')->references('id')->on('accounts')->cascadeOnDelete();
            $table->foreignUuid('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
