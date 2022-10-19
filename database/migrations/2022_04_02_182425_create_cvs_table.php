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
	        $table->foreign('email')->references('email')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('keyprogramming')->default(null)->nullable(true);
            $table->text('profile')->default(null)->nullable(true);
            $table->text('education')->default(null)->nullable(true);
            $table->text('URLlinks')->default(null)->nullable(true);
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
