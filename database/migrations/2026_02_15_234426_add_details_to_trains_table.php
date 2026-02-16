<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('trains', function (Blueprint $table) {

            $table->string("tipo_treno",100)->nullable()->after("azienda");
            $table->integer("binario_partenza")->nullable()->after("stazione_partenza");
            $table->integer("minuti_ritardo")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {
        
             $table->dropColumn(["tipo_treno","binario_partenza","minuti_ritardo"]);

        });
    }
};
