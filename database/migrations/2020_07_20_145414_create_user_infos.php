<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->comment('用户ID');
            $table->string('nickname', 128)->default('')->comment('用户昵称');
            $table->enum('gender', ['m', 'f', 'u'])->default('m')->comment('用户性别');
            $table->string('tel', 64)->default('')->comment('用户手机');
            $table->string('avatar', 256)->default('')->comment('用户头像');
            $table->unsignedInteger('department_id')->default(0)->comment('用户隶属部门');
            $table->text('remark')->comment('用户备注');
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
        Schema::dropIfExists('user_infos');
    }
}
