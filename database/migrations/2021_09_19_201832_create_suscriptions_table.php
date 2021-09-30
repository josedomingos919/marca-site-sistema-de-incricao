<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('cpf', 100)->unique();
            $table->string('address');
            $table->string('company');
            $table->string('phone_number');
            $table->string('cell_phone');
            $table->integer('courses_id');
            $table->enum('type', ['student', 'professional', 'associate']);
            $table->string('password');
            $table
                ->enum('status', ['pendding', 'payed', 'canceled'])
                ->default('pendding');
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
        Schema::dropIfExists('suscriptions');
    }
}
