<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pc_id')->default(0)->comment('权限分类ID');
            $table->string('name', 64)->comment('权限名称');
            $table->string('controller', 128)->comment('控制器名称');
            $table->string('route', 128)->default('')->comment('访问入口路由');
            $table->text('remark')->comment('路由备注');
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
        Schema::dropIfExists('privileges');
    }
}
