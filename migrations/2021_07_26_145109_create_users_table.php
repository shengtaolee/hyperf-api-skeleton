<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\Database\Migrations\Migration;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Schema\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 32)->comment('user id, generate by snowflake');
            $table->string('name', 50);
            $table->string('password', 32)->nullable();
            $table->string('phone', 15);

            $table->string('avatar_url', 500)->nullable();

            $table->boolean('is_banned')->default(false)->comment('是否禁用，0-否，1-是');

            // wechat
            $table->string('wechat_open_id', 32)->nullable();

            $table->timestamps();

            // indexes
            $table->unique('user_id', 'uk_user_id');
            $table->unique('wechat_open_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('users');
    }
}
