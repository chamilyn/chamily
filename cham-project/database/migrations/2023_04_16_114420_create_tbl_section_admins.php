<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSectionAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_section_admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->integer('created_user_id')->nullable();
            $table->integer('updated_user_id')->nullable();
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
        Schema::dropIfExists('tbl_section_admins');
    }
}
