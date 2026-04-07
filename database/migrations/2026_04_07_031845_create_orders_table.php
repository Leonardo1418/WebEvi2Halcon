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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');
        $table->string('invoice_number', 50)->unique();
        $table->string('customer_name', 150);
        $table->string('customer_number', 50);
        $table->text('fiscal_data')->nullable();
        $table->dateTime('order_date');
        $table->text('delivery_address');
        $table->text('notes')->nullable();
        $table->enum('status', ['Ordered', 'In process', 'In route', 'Delivered'])
              ->default('Ordered');
        $table->boolean('deleted')->default(false);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('orders');
}
};
