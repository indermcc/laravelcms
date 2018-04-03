<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class RowPage extends Model
{
    //
    public function cols() {
      return $this->hasMany(RowWidget::class);
    }
}
