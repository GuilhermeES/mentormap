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
        Schema::table('user_quizzes', function (Blueprint $table) {
            $table->unsignedBigInteger('result_id')->nullable();

            // Adiciona a chave estrangeira para a tabela 'results'
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_quizzes', function (Blueprint $table) {
            $table->dropForeign(['result_id']);
            $table->dropColumn('result_id');
        });
    }
};
