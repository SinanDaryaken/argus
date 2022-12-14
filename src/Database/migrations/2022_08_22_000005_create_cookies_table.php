<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('argus_cookies', function(Blueprint $table){
            $table->id();
            $table->text('key');
            $table->unsignedInteger('device_id');
            $table->unsignedInteger('operating_system_id');
            $table->unsignedInteger('browser_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('argus_cookies');
    }
};