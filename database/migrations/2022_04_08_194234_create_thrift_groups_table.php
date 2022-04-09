<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThriftGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thrift_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('token', 35)->unique();
            $table->string('name');
            $table->integer('thrifters')->default(1);
            $table->float('amount', 10, 2);
            $table->float('total_amount', 10, 2);
            $table->json('details')->nullable();
            $table->boolean('is_open')->default(true);
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
        Schema::dropIfExists('thrift_groups');
    }
}
