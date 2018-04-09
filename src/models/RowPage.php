<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class RowPage extends Model
{
    //
    public function locations() {
      return $this->hasMany(RowLocation::class)->orderBy('order');
    }

    public function layout() {
      return $this->belongsTo(RowLayout::class,'row_id','id');
    }

}
