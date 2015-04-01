<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
  use SoftDeletes;

  protected $dates=['deleted_at, created_at'];

  protected $guarded=['_token', 'action'];

  public function related()
  {
    return $this->morphTo();
  }

  public function owner()
  {
    return $this->belongsTo('App\User');
  }
}

