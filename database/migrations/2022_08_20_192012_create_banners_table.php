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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('texto')->nullable();
            $table->string('cor_texto')->nullable();
            $table->string('texto_botao')->nullable();
            $table->string('link_botao')->nullable();
            $table->string('cor_fundo_botao')->nullable();
            $table->string('imagem_fundo');
            $table->boolean('status')->default(1);
            $table->integer('ordem');
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
        Schema::dropIfExists('banners');
    }
};
