<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSavings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_savings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('note')->nullable();
            $table->integer('created_user_id')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tbl_saving_lineitems', function (Blueprint $table) {
            $table->id();
            $table->integer('saving_id')->nullable();
            $table->integer('transfer_id')->nullable();
            $table->dateTime('transfer_date')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('img_path')->nullable();
            $table->text('note')->nullable();
            $table->integer('created_user_id')->nullable();
            $table->integer('updated_user_id')->nullable();
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
        Schema::dropIfExists('tbl_savings');
    }
}
