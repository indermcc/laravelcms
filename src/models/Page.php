<?php

namespace Mcc\Laravelcms\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public $timestamps = true;

    public function getUniqueSlug() {
      $slug = $this->getAttribute('uri') ? $this->getAttribute('uri') : $this->getAttribute('title');
      $slug = preg_replace('/[^A-Za-z0-9\-]/','-',$slug);
      $slug = strtolower($slug);
      $count = Page::where(['uri'=>$slug]);
      if($this->id) {
        $count->where('id','!=',$this->id);
      }
      $count = $count->count();
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

    // deprecated code
    // public function blocks() {
    //   return $this->hasMany(Block::class);
    // }

    public function rows() {
      return $this->hasMany(RowPage::class)->orderBy('order');
    }
}
