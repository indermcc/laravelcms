<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class PageLayouts extends Model
{
    public $timestamps = true;

    public static function getLayouts() {
      return self::orderBy('id','desc')->pluck('name','id')->toArray();
    }

}
