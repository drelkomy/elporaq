<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * قم بتشغيل الهجرة.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('statistic_name'); // اسم الإحصائية
            $table->integer('count');         // العدد
            $table->timestamps();             // تواريخ الإنشاء والتحديث
        });
    }

    /**
     * تراجع الهجرة.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
