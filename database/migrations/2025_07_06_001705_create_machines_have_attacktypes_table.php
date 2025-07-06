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
        Schema::create('machines_have_attacktypes', function (Blueprint $table) {
            $table->foreignId('machine_fk')->constrained(table: 'machines', column: 'machine_id');
            $table->unsignedSmallInteger('attack_type_fk');
            $table->foreign('attack_type_fk')->references('attack_type_id')->on('attack_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines_have_attacktypes');
    }
};
