<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
  const SUPER_USER='1';
  const COMMUNITY_USER='2';
  const CRM_USER='3';
}
