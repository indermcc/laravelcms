<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $guarded = [];

    public $timestamps = true;

    public function layout() {
      return $this->belongsTo(BlockLayouts::class);
    }

    public function childBlocks() {
      return $this->hasMany(Block::class,'parent_id');
    }
}
