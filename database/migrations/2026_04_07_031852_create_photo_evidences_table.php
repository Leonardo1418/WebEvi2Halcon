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
        Schema::create('photo_evidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade');
            $table->enum('photo_type', ['Route', 'Delivery']);
            $table->string('file_path', 255);
            $table->dateTime('upload_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photo_evidences');
    }
};
