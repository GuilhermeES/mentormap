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
        Schema::table('users', function (Blueprint $table) {
            $table->string('cargo')->after('email')->nullable();
            $table->string('sexo')->after('cargo')->nullable();
            $table->date('data_nascimento')->after('sexo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cargo');
            $table->dropColumn('sexo');
            $table->dropColumn('data_nascimento');
        });
    }
};
