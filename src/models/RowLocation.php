<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class RowLocation extends Model
{
    //
    public function widgets() {
      return $this->hasMany(LocationWidget::class)->orderBy('order');
    }
}
