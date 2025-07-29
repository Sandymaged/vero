<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image', 50)->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('merchant_branch_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('merchant_id')
                ->references('id')
                ->on('merchants')
//                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('merchant_branch_id')
                ->references('id')
                ->on('merchant_branches')
//                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_users');
    }
}
