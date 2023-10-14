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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->integer('price')->default(0);
            $table->integer('quantity');
            $table->enum('size',['S','M','L','XL','XXL','XXXL'])->nullable();
            $table->enum('status', ['public', 'private']);
            $table->enum('department', ['men', 'women','kids'])->nullable();
            $table->string('by');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
