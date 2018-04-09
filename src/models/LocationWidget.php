<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class LocationWidget extends Model
{
    //
    public function widget() {
      return $this->hasOne(Widget::class,'id','widget_id');
    }

    public function widgetValues() {
      return $this->hasMany(WidgetValue::class);
    }

}
