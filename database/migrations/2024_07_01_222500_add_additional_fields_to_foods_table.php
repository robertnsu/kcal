<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->unsignedFloat('iron')->default(0)->after('protein');
        });

        Schema::table('foods', function (Blueprint $table) {
            $table->unsignedFloat('calcium')->default(0)->after('iron');
        });

        Schema::table('journal_entries', function (Blueprint $table) {
            $table->unsignedFloat('iron')->default(0)->after('protein');
        });

        Schema::table('journal_entries', function (Blueprint $table) {
            $table->unsignedFloat('calcium')->default(0)->after('iron');
        });

        Schema::table('goals', function (Blueprint $table) {
            $table->unsignedFloat('iron')->nullable()->after('protein');
        });

        Schema::table('goals', function (Blueprint $table) {
            $table->unsignedFloat('calcium')->nullable()->after('iron');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->dropColumn('calcium');
        });

        Schema::table('foods', function (Blueprint $table) {
            $table->dropColumn('iron');
        });

        Schema::table('journal_entries', function (Blueprint $table) {
            $table->dropColumn('calcium');
        });

        Schema::table('journal_entries', function (Blueprint $table) {
            $table->dropColumn('iron');
        });

        Schema::table('goals', function (Blueprint $table) {
            $table->dropColumn('calcium');
        });

        Schema::table('goals', function (Blueprint $table) {
            $table->dropColumn('iron');
        });
    }
}