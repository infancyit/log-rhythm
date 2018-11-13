<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogRhythmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('logrhythm.table_name', 'laravel_logs'), function (Blueprint $table) {
            $table->increments('id');
            $table->text('message')->nullable();
            $table->text('context')->nullable();
            $table->integer('level')->default(200);
            $table->enum('level_name', ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug']);
            $table->ipAddress('user_ip');
            $table->string('url', 200)->nullable();
            $table->string('http_method', 200)->nullable();
            $table->text('extra')->nullable();
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
        Schema::dropIfExists(config('logrhythm.table_name', 'laravel_logs'));
    }
}
