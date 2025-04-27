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
        //
        Schema::table('registries', function (Blueprint $table) {
            $table->unsignedBigInteger('operator_id')->nullable()->after('name');
            $table->unsignedBigInteger('country_id')->nullable()->after('operator_id');
        
            $table->dropColumn('operator');
            $table->dropColumn('country');
        
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('registries', function (Blueprint $table) {

        $table->dropColumn('operator_id');
        $table->dropColumn('country_id');
        });
    }
};
