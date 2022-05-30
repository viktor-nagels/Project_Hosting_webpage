<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('domain_name');
            $table->boolean('active')->default(true);
            $table->string('mysql_username');
            $table->string('mysql_password');
            $table->string('sftp_username');
            $table->string('sftp_password');
            $table->string('mysql_version');
            $table->string('php_version');
            $table->string('laravel_version');
            $table->timestamps();

            //foreign key relation
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
