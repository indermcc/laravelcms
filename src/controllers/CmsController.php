<?php

namespace Mcc\Laravelcms\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcc\Laravelcms\Models\Page;
use Mcc\Laravelcms\Models\Block;

class CmsController extends Controller
{
    public function index($slug) {
      // dd($slug);
      // dd(Page::class);
      $page = Page::where('uri',$slug)->with('blocks','layout','blocks.childBlocks','blocks.layout')->first();
      if(!$page)
        die('No page found with this name');

      $this->renderBlock($page->blocks);

      // dd(Page::$positions);

      return view($page->layout->file,compact('page'));
    }

    public function renderBlock($blocks) {

      $positions = Page::$positions;

      foreach($blocks as $block):
        Page::$positions[$block->type][] = view($block->layout->file,[
          'parent_block'  =>  $block,
          'child_blocks'  =>  $block->childBlocks
        ]);
      endforeach;

    }
}
