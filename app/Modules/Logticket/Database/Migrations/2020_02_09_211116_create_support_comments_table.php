<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('support_id');
            $table->foreign('support_id')
                ->on('supports')
                ->references('id')
                ->onDelete('cascade');
            $table->text('comment');
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
        Schema::dropIfExists('support_comments');
    }
}
