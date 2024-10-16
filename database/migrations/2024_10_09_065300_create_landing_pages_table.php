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
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('slug')->nullable();
            $table->longtext('description')->nullable();
            $table->string('backgroundimg');
            $table->text('sheet_id');
            $table->string('sheet_name');
            $table->timestamps();
            $table->softDeletes(); // This adds the `deleted_at` column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};
