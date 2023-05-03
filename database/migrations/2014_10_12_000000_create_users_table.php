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
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('country')->nullable();
            $table->bigInteger('country_id')->nullable();
            $table->string('state')->nullable();
            $table->bigInteger('state_id')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->string('pincode')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('user_status', ['a','r','p'])->comment('a -> accept,r->reject,p->pending')->nullable();
            $table->enum('user_type', ['a','u'])->comment('a->admin,u->user')->nullable();
            $table->longText('address')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
