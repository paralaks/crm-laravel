<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contacts', function (Blueprint $table)
    {
      $table->increments('id');
      $table->string('email')->unique();

      $table->string('title')->nullable();
      $table->string('first_name');
      $table->string('last_name');
      $table->string('department')->nullable();
      $table->text('description')->nullable();
      $table->date('birthdate')->nullable();
      $table->string('interests')->nullable();

      $table->string('phone')->nullable();
      $table->string('mobile_phone')->nullable();
      $table->string('home_phone')->nullable();
      $table->string('other_phone')->nullable();
      $table->string('fax')->nullable();

      $table->string('assistant')->nullable();
      $table->string('assistant_phone')->nullable();

      $table->boolean('do_not_call')->nullable();
      $table->boolean('do_not_email')->nullable();
      $table->boolean('do_not_fax')->nullable();

      $table->boolean('email_opt_out')->nullable();
      $table->boolean('fax_opt_out')->nullable();

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

      $table->integer('salutation_id')->unsigned()->nullable();
      $table->integer('lead_source_id')->unsigned()->nullable();
      $table->integer('type_id')->unsigned()->nullable();
      $table->integer('converted_lead_id')->unsigned()->nullable();

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
    Schema::drop('contacts');
  }
}
