<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('state_id');
            $table->decimal('deposit_percentage', 5, 2)->default(0.00);
            $table->tinyInteger('type')->default(1);
            $table->string('logo', 50)->nullable();
            $table->string('image', 50)->nullable();
            $table->string('video_url', 150)->nullable();
            $table->point('location');
            $table->string('admin_name');
            $table->string('reservations_responsible_name');
            $table->string('admin_phone', 25);
            $table->string('reservations_responsible_phone', 25);
            $table->string('email', 80)->unique();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            // Add a spatial index on the location field
            $table->spatialIndex('location');

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
        Schema::dropIfExists('merchants');
    }
}
