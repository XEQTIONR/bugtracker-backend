<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('asignee_id');
            $table->integer('serial_no');
            $table->unsignedInteger('type');
            $table->string('title');
            $table->string('description');

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('restrict');

            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->foreign('asignee_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('issues');
    }
}
