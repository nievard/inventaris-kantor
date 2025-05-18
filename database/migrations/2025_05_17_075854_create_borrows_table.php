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
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigInteger('id');    
            $table->bigInteger('item_id');   
            $table->string('borrower_name', 100);
            $table->integer('quantity'); 
            $table->date('borrow_date');
            $table->enum('status',['borrowed','returned']);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
