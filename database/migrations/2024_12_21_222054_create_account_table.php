<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 50);
            $table->string('description', length: 1000)->default('');
            $table->foreignId('portfolio_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps(precision: 6);
            $table->softDeletes(precision: 6);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
