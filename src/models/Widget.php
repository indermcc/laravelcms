<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Widget extends Model
{
  use SoftDeletes;
  
  protected $guarded = [];

  public $timestamps = true;

  public function attributes() {
    return $this->hasMany(WidgetAttribute::class);
  }
}
