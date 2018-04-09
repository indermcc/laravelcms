<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class WidgetValue extends Model
{
    //
    public function attribute() {
      return $this->belongsTo(WidgetAttribute::class,'attribute_id','id');
    }
}
