<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserGroup;

define('NOW', date('Y-m-d H:i:s'));

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Model::unguard();

    $this->call('UserTableSeeder');
    $this->call('UserGroupsTableSeeder');
    $this->call('LkpSalutationTableSeeder');
    $this->call('LkpIndustryTableSeeder');
    $this->call('LkpLeadSourceTableSeeder');
    $this->call('LkpLeadStatusTableSeeder');
    $this->call('LkpRatingTableSeeder');
    $this->call('LkpContactTypeTableSeeder');
    $this->call('LkpAccountTypeTableSeeder');
    $this->call('LkpOwnershipTableSeeder');
    $this->call('LkpOpportunityStageTableSeeder');
    $this->call('LkpOpportunityTypeTableSeeder');
    $this->call('LkpActivityPriorityTableSeeder');
    $this->call('LkpActivityStatusTableSeeder');
    $this->call('LkpActivityTypeTableSeeder');

    $this->call('AccountsTableSeeder');
    $this->call('ContactsTableSeeder');
    $this->call('OpportunitiesTableSeeder');
    $this->call('LeadsTableSeeder');
  }
}

class UserTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('users')->delete();

    User::create([
      'email'=>'superuser@crm.com',
      'name'=>'Super User',
      'password'=>bcrypt('test'),
      'user_group_id'=>1]);
    User::create([
      'email'=>'community@crm.com',
      'name'=>'Community User',
      'password'=>bcrypt('test'),
      'user_group_id'=>2]);
    User::create([
      'email'=>'crm@crm.com',
      'name'=>'Regular User',
      'password'=>bcrypt('test'),
      'user_group_id'=>3]);
  }
}

class UserGroupsTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('user_groups')->delete();

    UserGroup::create([
      'id'=>UserGroup::SUPER_USER,
      'value'=>'Super User']);
    UserGroup::create([
      'id'=>UserGroup::COMMUNITY_USER,
      'value'=>'Community User']);
    UserGroup::create([
      'id'=>UserGroup::CRM_USER,
      'value'=>'Basic User']);
  }
}

class LkpSalutationTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_salutation')->delete();

    DB::table('lkp_salutation')->insert(array(
      'value'=>'Mr.',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_salutation')->insert(array(
      'value'=>'Ms.',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_salutation')->insert(array(
      'value'=>'Miss',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_salutation')->insert(array(
      'value'=>'Mrs.',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_salutation')->insert(array(
      'value'=>'Dr.',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_salutation')->insert(array(
      'value'=>'Prof.',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpIndustryTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_industry')->delete();

    DB::table('lkp_industry')->insert(array(
      'value'=>'Agriculture',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Apparel',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Banking',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Biotechnology',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Chemicals',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Communications',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Construction',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Consulting',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Education',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Electronics',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Energy',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Engineering',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Entertainment',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Environmental',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Finance',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Food & Beverage',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Government',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Healthcare',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Hospitality',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Insurance',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Machinery',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Manufacturing',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Media',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Not For Profit',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Recreation',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Retail',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Shipping',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Technology',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Telecommunications',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Transportation',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Utilities',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_industry')->insert(array(
      'value'=>'Other',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpLeadSourceTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_lead_source')->delete();

    DB::table('lkp_lead_source')->insert(array(
      'value'=>'Web',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_source')->insert(array(
      'value'=>'Phone Inquiry',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_source')->insert(array(
      'value'=>'Activity Signup',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_source')->insert(array(
      'value'=>'Partner Referral',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_source')->insert(array(
      'value'=>'Product Purchase',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_source')->insert(array(
      'value'=>'Purchased List',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_source')->insert(array(
      'value'=>'Other',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpLeadStatusTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_lead_status')->delete();

    DB::table('lkp_lead_status')->insert(array(
      'value'=>'Open - Not Contacted',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_status')->insert(array(
      'value'=>'Working - Contacted',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_status')->insert(array(
      'value'=>'Closed - Converted',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_lead_status')->insert(array(
      'value'=>'Closed - Not Converted',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpRatingTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_rating')->delete();

    DB::table('lkp_rating')->insert(array(
      'value'=>'Hot',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_rating')->insert(array(
      'value'=>'Warm',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_rating')->insert(array(
      'value'=>'Cold',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpContactTypeTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_contact_type')->delete();

    DB::table('lkp_contact_type')->insert(array(
      'value'=>'Prospect',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_contact_type')->insert(array(
      'value'=>'Active',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_contact_type')->insert(array(
      'value'=>'Inactive',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_contact_type')->insert(array(
      'value'=>'Expired',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpAccountTypeTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_account_type')->delete();

    DB::table('lkp_account_type')->insert(array(
      'value'=>'Prospect',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_type')->insert(array(
      'value'=>'Active',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_type')->insert(array(
      'value'=>'Inactive',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_type')->insert(array(
      'value'=>'Expired',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_type')->insert(array(
      'value'=>'Reseller',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_type')->insert(array(
      'value'=>'Partner',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_type')->insert(array(
      'value'=>'Other',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpOwnershipTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_account_ownership')->delete();

    DB::table('lkp_account_ownership')->insert(array(
      'value'=>'Public',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_ownership')->insert(array(
      'value'=>'Private',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_ownership')->insert(array(
      'value'=>'Subsidiary',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_account_ownership')->insert(array(
      'value'=>'Other',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpOpportunityStageTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_opportunity_stage')->delete();

    DB::table('lkp_opportunity_stage')->insert(array(
      'value'=>'New',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_opportunity_stage')->insert(array(
      'value'=>'Analysis',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_opportunity_stage')->insert(array(
      'value'=>'Proposal/Quote',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_opportunity_stage')->insert(array(
      'value'=>'Negotiation',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_opportunity_stage')->insert(array(
      'value'=>'Closed Won',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_opportunity_stage')->insert(array(
      'value'=>'Closed Lost',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpOpportunityTypeTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_opportunity_type')->delete();

    DB::table('lkp_opportunity_type')->insert(array(
      'value'=>'New Customer',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_opportunity_type')->insert(array(
      'value'=>'Upgrade',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_opportunity_type')->insert(array(
      'value'=>'Downgrade',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_opportunity_type')->insert(array(
      'value'=>'Replacement',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpActivityPriorityTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_activity_priority')->delete();

    DB::table('lkp_activity_priority')->insert(array(
      'value'=>'High',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_priority')->insert(array(
      'value'=>'Normal',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_priority')->insert(array(
      'value'=>'Low',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpActivityStatusTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_activity_status')->delete();

    DB::table('lkp_activity_status')->insert(array(
      'value'=>'Not Started',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_status')->insert(array(
      'value'=>'In Progress',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_status')->insert(array(
      'value'=>'Deferred',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_status')->insert(array(
      'value'=>'Completed',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LkpActivityTypeTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('lkp_activity_type')->delete();

    DB::table('lkp_activity_type')->insert(array(
      'value'=>'Call',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_type')->insert(array(
      'value'=>'Meeting',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_type')->insert(array(
      'value'=>'Email',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_type')->insert(array(
      'value'=>'Task',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_type')->insert(array(
      'value'=>'Event',
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('lkp_activity_type')->insert(array(
      'value'=>'Other',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class AccountsTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('accounts')->delete();

    DB::table('accounts')->insert(array(
      'name'=>'Samsung Electronics Co., Ltd.',
      'number'=>'EL-SMSG',
      'phone'=>'+1 425-614-1047',
      'fax'=>'',
      'annual_revenue'=>'20000000000',
      'num_of_employees'=>'12000',
      'website'=>'www.samsung.com',
      'description'=>' South Korean multinational electronics company headquartered in Suwon, South Korea',
      'street'=>'146th Place Southeast',
      'city'=>'Bellevue',
      'state'=>'WA',
      'zip'=>'98007',
      'country'=>'US',
      'street_other'=>'',
      'city_other'=>'',
      'state_other'=>'',
      'zip_other'=>'',
      'country_other'=>'',
      'lead_source_id'=>'2',
      'industry_id'=>'1',
      'type_id'=>'2',
      'ownership_id'=>'1',
      'rating_id'=>'1',
      'owner_id'=>'1',
      'adder_id'=>'1',
      'modifier_id'=>1,
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('accounts')->insert(array(
      'name'=>'Microsoft Corporation',
      'number'=>'IT-MSOF',
      'phone'=>'+1 425-614-7109',
      'fax'=>'',
      'annual_revenue'=>'20000000000',
      'num_of_employees'=>'15000',
      'website'=>'www.microsoft.com',
      'description'=>'American multinational corporation headquartered in Redmond, Washington, that develops, manufactures, licenses, supports and sells computer software, consumer electronics and personal computers and services.',
      'street'=>'1399 124th Ave NE',
      'city'=>'Bellevue',
      'state'=>'WA',
      'zip'=>'98007',
      'country'=>'US',
      'street_other'=>'',
      'city_other'=>'',
      'state_other'=>'',
      'zip_other'=>'',
      'country_other'=>'',
      'lead_source_id'=>'2',
      'industry_id'=>'1',
      'type_id'=>'2',
      'ownership_id'=>'1',
      'rating_id'=>'1',
      'owner_id'=>'1',
      'adder_id'=>'1',
      'modifier_id'=>1,
      'created_at'=>NOW,
      'updated_at'=>NOW));
    DB::table('accounts')->insert(array(
      'name'=>'Walmart',
      'number'=>'RET-WLMR',
      'phone'=>'+1 425-614-8703',
      'fax'=>'',
      'annual_revenue'=>'2000000000',
      'num_of_employees'=>'25000',
      'website'=>'www.walmart.com',
      'description'=>' American multinational retail corporation that operates a chain of discount department stores and warehouse stores. Headquartered in Bentonville, Arkansas, the company was founded by Sam Walton in 1962 and incorporated on October 31, 1969. It has over 11,000 stores in 27 countries, under a total 71 banners',
      'street'=>'12620 SE 41st Pl',
      'city'=>'Bellevue',
      'state'=>'WA',
      'zip'=>'98007',
      'country'=>'US',
      'street_other'=>'',
      'city_other'=>'',
      'state_other'=>'',
      'zip_other'=>'',
      'country_other'=>'',
      'lead_source_id'=>'2',
      'industry_id'=>'1',
      'type_id'=>'1',
      'ownership_id'=>'1',
      'rating_id'=>'1',
      'owner_id'=>'1',
      'adder_id'=>'1',
      'modifier_id'=>1,
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class ContactsTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('contacts')->delete();

    DB::table('contacts')->insert(array(
      'email'=>'satya@microsoft.com',
      'title'=>'CEO',
      'first_name'=>'Satya',
      'last_name'=>'Nadella',
      'department'=>'Upper Management',
      'interests'=>'mobile technologies',
      'description'=>'',
      'phone'=>'1-222-333-3333',
      'mobile_phone'=>'1-111-222-2222',
      'home_phone'=>'',
      'other_phone'=>'',
      'fax'=>'',
      'assistant'=>'Inspector Gadget',
      'assistant_phone'=>'1-999-999-9999',
      'do_not_call'=>'1',
      'do_not_email'=>'1',
      'do_not_fax'=>'1',
      'email_opt_out'=>'1',
      'fax_opt_out'=>'1',
      'street'=>'1399 124th Ave NE',
      'city'=>'Bellevue',
      'state'=>'WA',
      'zip'=>'98007',
      'country'=>'US',
      'street_other'=>'',
      'city_other'=>'',
      'state_other'=>'',
      'zip_other'=>'',
      'country_other'=>'',
      'salutation_id'=>'1',
      'lead_source_id'=>'1',
      'type_id'=>'1',
      'account_id'=>'2',
      'owner_id'=>'1',
      'adder_id'=>'1',
      'modifier_id'=>'1',
      'created_at'=>NOW,
      'updated_at'=>NOW));

    DB::table('contacts')->insert(array(
      'email'=>'dougm@walmart.com',
      'title'=>'President & CEO',
      'first_name'=>'Doub',
      'last_name'=>'McMillon',
      'department'=>'Upper Management',
      'interests'=>'server management, search engines',
      'description'=>'President and Chief Executive Officer of Walmart Stores, Inc. (NYSE: WMT). McMillon was promoted to succeed Mike Duke, 63, as President and Chief Executive Officer of Walmart on November 25, 2013 and assumed the role on February 1, 2014. McMillon also sits on the company’s board of directors.',
      'phone'=>'1-666-555-5555',
      'mobile_phone'=>'1-888-444-4444',
      'home_phone'=>'',
      'other_phone'=>'',
      'fax'=>'',
      'assistant'=>'Beetlejuice',
      'assistant_phone'=>'1-666-666-6666',
      'do_not_call'=>'1',
      'do_not_email'=>'1',
      'do_not_fax'=>'1',
      'email_opt_out'=>'1',
      'fax_opt_out'=>'1',
      'street'=>'1399 124th Ave NE',
      'city'=>'Bellevue',
      'state'=>'WA',
      'zip'=>'98007',
      'country'=>'US',
      'street_other'=>'',
      'city_other'=>'',
      'state_other'=>'',
      'zip_other'=>'',
      'country_other'=>'',
      'salutation_id'=>'1',
      'lead_source_id'=>'1',
      'type_id'=>'1',
      'account_id'=>'3',
      'owner_id'=>'2',
      'adder_id'=>'2',
      'modifier_id'=>'2',
      'created_at'=>NOW,
      'updated_at'=>NOW));

    DB::table('contacts')->insert(array(
      'email'=>'lkh@samsung.com',
      'title'=>'President & CEO',
      'first_name'=>'Lee',
      'last_name'=>'Kun-hee',
      'department'=>'Upper Management',
      'description'=>'South Korean business magnate and the chairman of Samsung Group. He had resigned in April 2008, owing to a Samsung slush funds scandal, but returned on March 24, 2010.',
      'phone'=>'1-777-222-2222',
      'mobile_phone'=>'1-999-777-7777',
      'home_phone'=>'',
      'other_phone'=>'',
      'fax'=>'',
      'assistant'=>'Chucky',
      'assistant_phone'=>'1-666-666-9999',
      'do_not_call'=>'1',
      'do_not_email'=>'1',
      'do_not_fax'=>'1',
      'email_opt_out'=>'1',
      'fax_opt_out'=>'1',
      'street'=>'146th Place Southeast',
      'city'=>'Bellevue',
      'state'=>'WA',
      'zip'=>'98007',
      'country'=>'US',
      'street_other'=>'',
      'city_other'=>'',
      'state_other'=>'',
      'zip_other'=>'',
      'country_other'=>'',
      'salutation_id'=>'1',
      'lead_source_id'=>'1',
      'type_id'=>'1',
      'account_id'=>'1',
      'owner_id'=>'2',
      'adder_id'=>'2',
      'modifier_id'=>'2',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class OpportunitiesTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('opportunities')->delete();

    DB::table('opportunities')->insert(array(
      'name'=>'7" Amoled Screen',
      'amount'=>'250000',
      'close_date'=>'2020-06-01',
      'expected_revenue'=>'2000000',
      'next_step'=>'Contact them to dicuss shipment requirements',
      'probability'=>'75',
      'competitors'=>'Sharp, Philips',
      'description'=>'7" HD screens',
      'lead_source_id'=>'3',
      'stage_id'=>'1',
      'type_id'=>'1',
      'contact_id'=>'1',
      'owner_id'=>'1',
      'adder_id'=>'1',
      'modifier_id'=>'1',
      'created_at'=>NOW,
      'updated_at'=>NOW));

    DB::table('opportunities')->insert(array(
      'name'=>'55" LED TV',
      'amount'=>'10000',
      'close_date'=>'2017-10-12',
      'expected_revenue'=>'3000000',
      'next_step'=>'',
      'probability'=>'75',
      'competitors'=>'LG, Vizio',
      'description'=>'',
      'lead_source_id'=>'2',
      'stage_id'=>'2',
      'type_id'=>'1',
      'contact_id'=>'2',
      'owner_id'=>'2',
      'adder_id'=>'2',
      'modifier_id'=>'2',
      'created_at'=>NOW,
      'updated_at'=>NOW));

    DB::table('opportunities')->insert(array(
      'name'=>'12" Touchscreen Display',
      'amount'=>'25000',
      'close_date'=>'2021-11-31',
      'expected_revenue'=>'5000000',
      'next_step'=>'',
      'probability'=>'90',
      'competitors'=>'Toshiba, Nec',
      'description'=>'',
      'lead_source_id'=>'1',
      'stage_id'=>'2',
      'type_id'=>'1',
      'contact_id'=>'3',
      'owner_id'=>'1',
      'adder_id'=>'2',
      'modifier_id'=>'1',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}

class LeadsTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('leads')->delete();

    DB::table('leads')->insert(array(
      'id'=>'1',
      'email'=>'bill@microsoft.com',
      'title'=>'Retired',
      'first_name'=>'Bill',
      'last_name'=>'Gates',
      'description'=>'Used to be CEO now doing charity work',
      'company'=>'Microsoft',
      'num_of_employees'=>'35344',
      'website'=>'www.microsoft.com',
      'annual_revenue'=>'6000000000',
      'phone'=>'357-634-0488',
      'mobile_phone'=>'',
      'fax'=>'',
      'do_not_call'=>'1',
      'do_not_email'=>'1',
      'do_not_fax'=>'',
      'email_opt_out'=>'',
      'fax_opt_out'=>'',
      'birthdate'=>'01-01-1940',
      'street'=>'35 Software Ave',
      'city'=>'Seattle',
      'state'=>'WA',
      'zip'=>'03884',
      'country'=>'US',
      'salutation_id'=>'1',
      'lead_source_id'=>'1',
      'status_id'=>'1',
      'industry_id'=>'1',
      'rating_id'=>'1',
      'read_by_owner'=>'1',
      'owner_id'=>'1',
      'adder_id'=>'1',
      'modifier_id'=>'1',
      'created_at'=>NOW,
      'updated_at'=>NOW));

    DB::table('leads')->insert(array(
      'id'=>'2',
      'email'=>'larry@oraacle.com',
      'title'=>'CEO',
      'first_name'=>'Larry',
      'last_name'=>'Ellison',
      'description'=>'Loves Pharraree',
      'company'=>'Oracle',
      'num_of_employees'=>'13344',
      'website'=>'www.oracle.com',
      'annual_revenue'=>'200000000',
      'phone'=>'564-634-0488',
      'mobile_phone'=>'',
      'fax'=>'',
      'do_not_call'=>'1',
      'do_not_email'=>'1',
      'do_not_fax'=>'',
      'email_opt_out'=>'',
      'fax_opt_out'=>'',
      'birthdate'=>'01-01-1940',
      'street'=>'666 Church St West',
      'city'=>'San Jose',
      'state'=>'CA',
      'zip'=>'30484',
      'country'=>'US',
      'salutation_id'=>'1',
      'lead_source_id'=>'1',
      'status_id'=>'1',
      'industry_id'=>'1',
      'rating_id'=>'1',
      'read_by_owner'=>'1',
      'owner_id'=>'1',
      'adder_id'=>'1',
      'modifier_id'=>'1',
      'created_at'=>NOW,
      'updated_at'=>NOW));
  }
}



