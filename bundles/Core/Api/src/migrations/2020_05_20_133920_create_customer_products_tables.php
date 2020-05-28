<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerProductsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->text('firstName');
            $table->text('lastName');
            $table->date('dateOfBirth');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('customer_id');
            $table->enum('status', ["new", "pending", "in review", "approved", "inactive", "deleted"])->default("new");
            $table->text('issn');
            $table->text('name');
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
        Schema::dropIfExists('customers');
        Schema::dropIfExists('products');
    }
}
