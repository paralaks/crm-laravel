<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('accounts', function (Blueprint $table)
    {
      $table->increments('id');
      $table->string('name');
      $table->string('number');
      $table->string('phone')->nullable();
      $table->string('fax')->nullable();
      $table->decimal('annual_revenue', 12, 2)->nullable();
      $table->integer('num_of_employees')->unsigned()->nullable();
      $table->string('website')->nullable();
      $table->text('description')->nullable();

      $table->string('street')->nullable();
      $table->string('city')->nullable();
      $table->string('state')->nullable();
      $table->string('zip')->nullable();
      $table->string('country')->nullable();

      $table->string('street_other')->nullable();
      $table->string('city_other')->nullable();
      $table->string('state_other')->nullable();
      $table->string('zip_other')->nullable();
      $table->string('country_other')->nullable();

      $table->integer('lead_source_id')->unsigned()->nullable();
      $table->integer('industry_id')->unsigned()->nullable();
      $table->integer('type_id')->unsigned()->nullable();
      $table->integer('ownership_id')->unsigned()->nullable();
      $table->integer('rating_id')->unsigned()->nullable();

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
    Schema::drop('accounts');
  }
}
