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
            $table->foreignId('client_id')->constrained('clients')->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('service_id')->constrained('services')->onUpdate('restrict')->onDelete('restrict');
            $table->date('date');
            $table->time('heure');
            $table->enum('status', ['en_attente', 'confirmer', 'annule'])->default('en_attente');
            $table->dateTime('debut_prestation')->nullable();
            $table->dateTime('fin_prestation')->nullable();
            $table->enum('etat', ['termine', 'en_cours', 'annule'])->default('en_cours');
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
