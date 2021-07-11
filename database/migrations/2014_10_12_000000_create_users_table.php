<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            $table->string('firstName');
            $table->string('lastName');
            $table->string('userName')->unique();
            $table->string('nationalCode')->length(10)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('userType',['teacher','student','manager','guest'])->default('guest');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'firstName' => 'admin',
            'lastName' => 'admini',
            'userName' => 'admin',
            'nationalCode' => '2260214401',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678),
            'userType' => 'manager',
         ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
