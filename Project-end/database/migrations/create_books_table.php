
<!-- LE MIGRAZIONI SONO AVVENUTE CON SUCCESSO!!!! -->


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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->unique();
            $table->integer('price')->nullable();
            $table->string('author', 30);
            $table->string('img', 300)->nullable();
            $table->unsignedBigInteger('author_id')->nullable(); // chiave esterna
            $table->unsignedBigInteger('user_id')->nullable(); // altra chiave esterna
            $table->timestamps();

            // Definisci la chiave esterna per author_id
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};