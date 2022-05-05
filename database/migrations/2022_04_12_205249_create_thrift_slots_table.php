<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThriftSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thrift_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('thrift_group_id');
            $table->date('slot_date');
            $table->string('status');
            $table->boolean('is_movable')->default(1);
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('thrift_slots');
    }
}
