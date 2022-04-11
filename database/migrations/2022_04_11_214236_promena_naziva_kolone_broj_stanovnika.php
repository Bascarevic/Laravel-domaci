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
        Schema::table('drzavas', function (Blueprint $table)
        {
            $table->renameColumn('brStanovnika', 'brojStanovnika');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drzavas', function(Blueprint $table){
            $table->renameColumn('brojStanovnika', 'brStanovnika');
        });
    }
};
