<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('opportunities', function (Blueprint $table)
    {
      $table->increments('id');
      $table->string('name');
      $table->decimal('amount', 12, 2)->nullable();
      $table->date('close_date');
      $table->decimal('expected_revenue', 12, 2)->nullable();
      $table->string('next_step')->nullable();
      $table->smallInteger('probability');
      $table->string('competitors')->nullable();
      $table->text('description')->nullable();

      $table->integer('lead_source_id')->unsigned()->nullable();
      $table->integer('stage_id')->unsigned()->nullable();
      $table->integer('type_id')->unsigned()->nullable();

      $table->integer('account_id')->unsigned()->nullable();
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
    Schema::drop('opportunities');
  }
}
