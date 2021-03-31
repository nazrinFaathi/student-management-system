<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('reports')) {
            Schema::create('reports', function (Blueprint $table) {
                $table->increments('report_id');
                $table->bigInteger('student_id')->index();
                $table->string('term');
                $table->decimal('science', 8, 2)->nullable();
                $table->decimal('maths', 8, 2)->nullable();
                $table->decimal('history', 8, 2)->nullable();
                $table->decimal('total_marks', 8, 2)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
