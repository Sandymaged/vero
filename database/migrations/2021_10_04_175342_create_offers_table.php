<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('merchant_branch_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->tinyInteger('type')->default(1);
            $table->text('extra_details')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('application_percentage', 5, 2)->default(0.00);
            $table->string('image', 50)->nullable();
            $table->string('video_url', 150)->nullable();
            $table->tinyInteger('is_active')->default(1);
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

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
//                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('subcategory_id')
                ->references('id')
                ->on('categories')
//                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('service_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('offers');
    }
}
