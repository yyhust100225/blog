<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('p_id')->default(0)->comment('父权限分类ID');
            $table->string('name', 128)->comment('权限分类名称');
            $table->string('icon', 128)->comment('权限分类图标');
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
        Schema::dropIfExists('privilege_categories');
    }
}
