<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public $timestamps = true;

    public static $positions = ['left'=>[],'right'=>[],'center'=>[]];

    public function getUniqueSlug() {
      $slug = $this->getAttribute('uri') ? $this->getAttribute('uri') : $this->getAttribute('title');
      $slug = preg_replace('/[^A-Za-z0-9\-]/','_',$slug);
      $slug = strtolower($slug);
      $count = Page::where(['uri'=>$slug])->count();
      $i = 1;
      while($count) {
        $slug .= $i;
        $count = Page::where(['uri'=>$slug])->count();
        $i++;
      }
      $this->uri = $slug;
    }

    public function layout() {
      return $this->belongsTo(PageLayouts::class);
    }

    public function blocks() {
      return $this->hasMany(Block::class);
    }
}
