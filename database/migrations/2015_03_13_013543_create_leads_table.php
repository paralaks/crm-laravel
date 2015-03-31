<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('leads', function(Blueprint $table)
    {
      $table->increments('id');
      $table->string('email')->unique();

      $table->string('title')->nullable();
      $table->string('first_name');
      $table->string('last_name');
      $table->text('description')->nullable();
      $table->string('company')->nullable();
      $table->integer('num_of_employees')->unsigned()->nullable();
      $table->string('website')->nullable();
      $table->decimal('annual_revenue', 12, 2)->nullable();

      $table->string('phone')->nullable();
      $table->string('mobile_phone')->nullable();
      $table->string('fax')->nullable();

      $table->boolean('do_not_call')->nullable();
      $table->boolean('do_not_email')->nullable();
      $table->boolean('do_not_fax')->nullable();

      $table->boolean('email_opt_out')->nullable();
      $table->boolean('fax_opt_out')->nullable();

      $table->date('birthdate')->nullable();

      $table->string('street')->nullable();
      $table->string('city')->nullable();
      $table->string('state')->nullable();
      $table->string('zip')->nullable();
      $table->string('country')->nullable();

      $table->integer('salutation_id')->unsigned()->nullable();
      $table->integer('lead_source_id')->unsigned()->nullable();
      $table->integer('status_id')->unsigned()->nullable();
      $table->integer('industry_id')->unsigned()->nullable();
//      $table->integer('campaign_id')->unsigned()->nullable();
      $table->integer('rating_id')->unsigned()->nullable();

      $table->boolean('read_by_owner')->nullable();

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
    Schema::drop('leads');
  }

}
