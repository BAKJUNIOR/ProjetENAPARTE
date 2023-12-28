<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('employee_id')->constrained()->nullable();
            $table->foreignId('service_id')->constrained();
            $table->date('date');
            $table->enum('statut', ['en_attente', 'confirme', 'an  nule'])->default('en_attente');
            $table->dateTime('debut_prestation')->nullable();
            $table->dateTime('fin_prestation')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rendez_vouses');
    }
};
