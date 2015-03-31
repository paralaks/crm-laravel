<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('activities', function(Blueprint $table)
    {
      $table->increments('id');
      $table->string('subject');
      $table->string('location');
      $table->date('start_date')->nullable();
      $table->date('end_date')->nullable();
      $table->text('description')->nullable();
      $table->smallInteger('allday')->unsigned()->nullable();
      $table->dateTime('remind_at')->nullable();

      $table->smallInteger('type_id')->unsigned()->nullable();
      $table->smallInteger('priority_id')->unsigned()->nullable();
      $table->smallInteger('status_id')->unsigned()->nullable();

      $table->integer('related_id')->unsigned()->nullable();
      $table->string('related_type')->nullable();

      $table->integer('owner_id')->unsigned()->nullable();
      $table->integer('adder_id')->unsigned()->nullable();
      $table->integer('modifier_id')->unsigned()->nullable();
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
    Schema::drop('activities');
  }

}
