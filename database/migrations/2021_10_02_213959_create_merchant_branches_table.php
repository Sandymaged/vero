<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('state_id');
            $table->point('location');
            $table->string('responsible_name');
            $table->string('responsible_phone', 25);
            $table->string('image', 50)->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            // Add a spatial index on the location field
            $table->spatialIndex('location');

            $table->foreign('merchant_id')
                ->references('id')
                ->on('merchants')
//                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
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
        Schema::dropIfExists('merchant_branches');
    }
}
