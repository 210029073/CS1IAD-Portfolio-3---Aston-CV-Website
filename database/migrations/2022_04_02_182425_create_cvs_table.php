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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id()->unsigned()->nullable(false)->autoIncrement(2);
            $table->string('name',100)->nullable(false);
            $table->string('email',100)->nullable(false)->unique();
            $table->string('password', 255)->nullable(false);
            $table->string('keyprogramming')->default(null)->nullable(true);
            $table->string('profile')->default(null)->nullable(true);
            $table->string('education')->default(null)->nullable(true);
            $table->string('URLlinks')->default(null)->nullable(true);
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
};
