<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Select;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Select::class);
            $table->string('option_value');
            $table->text('option_text');
            $table->ipAddress();
            $table->timestamps();
            $table->softDeletes(); // This adds the `deleted_at` column
            $table->foreign('select_id')
            ->references('id')
            ->on('selects')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
