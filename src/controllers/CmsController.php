<?php

namespace Mcc\Laravelcms\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcc\Laravelcms\Models\Page;
use Mcc\Laravelcms\Models\Block;

class CmsController extends Controller
{

    public static $_page;
    public $_content = "";
    public function index($slug) {
      self::$_page = Page
      ::where('uri',$slug)
      ->with(
        'layout',
        'rows','rows.locations',
        'rows.layout',
        'rows.locations.widgets',
        'rows.locations.widgets.widget',
        'rows.locations.widgets.widgetValues',
        'rows.locations.widgets.widgetValues.attribute'
        )
      ->first();
      // dd($page);
      if(!self::$_page)
        die('No page found with this name');


      $this->renderPage();

      $page = self::$_page;
      $content = $this->_content;
      // dd(self::$_page->layout->file);
      return view(self::$_page->layout->file,compact('page','content'));
    }

    public function strView($view, $args) {
        $template = \Blade::compileString($view);
        ob_start() and extract($args, EXTR_SKIP);
        try {
            eval('?>' . $template);
        } catch (\Exception $e) {
            ob_get_clean(); throw $e;
        }
        $content = ob_get_clean();
        return $content;
    }

    public function renderPage() {
      foreach(self::$_page->rows as $row_index => $row):
        $tmpContent = "";
        $location_attributes = [];
        foreach($row->locations as $loc_index => $location):
          $loc_index += 1;
          $widget_content = "";
          foreach($location->widgets as $widget):
            $attributes = [];
            foreach($widget->widgetValues as $widgetValue):
              $attributes[$widgetValue->attribute->key] = $widgetValue->attribute->type == 'text' ? $widgetValue->value_text : $widgetValue->value_string;
            endforeach;
            $widget_content .= $this->strView($widget->widget->layout,$attributes);
          endforeach;
          $location_attributes["LOC$loc_index"] = $widget_content;
        endforeach;
        $this->_content .= $this->strView($row->layout->layout,$location_attributes);
      endforeach;
    }

    public function index_old($slug) {
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
