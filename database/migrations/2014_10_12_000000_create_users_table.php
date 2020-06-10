<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('region',function (Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->string('identificador');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('proyecto',function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_region');
            $table->foreign('id_region')->references('id')->on('region')->onDelete('cascade');
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('gerentes', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_proyecto');
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('operaciones', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_proyecto');
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade');
            $table->integer('dia');
            $table->integer('no_operaciones');
            $table->integer('ano');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('operaciones');
        Schema::dropIfExists('gerentes');
        Schema::dropIfExists('proyecto');   
        Schema::dropIfExists('region');
    }
}
