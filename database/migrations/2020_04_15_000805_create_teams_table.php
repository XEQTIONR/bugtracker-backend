<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('organization_id')->nullable()->default(null);
            $table->unsignedInteger('creator_id')->nullable()->default(null);

            $table->string('name');
            $table->string('description');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);

            $table->foreign('organization_id')
                    ->references('id')
                    ->on('organizations')
                    ->onDelete('no action');

            $table->foreign('creator_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
