<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('issue_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('reply_to')->nullable()->default(null);
            $table->string('title');
            $table->string('description');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);

            $table->foreign('issue_id')
                ->references('id')
                ->on('issues');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('reply_to')
                ->references('id')
                ->on('issue_comments')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue_comments');
    }
}
