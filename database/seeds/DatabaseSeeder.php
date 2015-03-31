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

  }
}

class ContactsTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('contacts')->delete();

  }
}

class OpportunitiesTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('opportunities')->delete();

  }
}

class LeadsTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('leads')->delete();

  }
}



