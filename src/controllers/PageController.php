<?php

namespace Mcc\Laravelcms\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

use Mcc\Laravelcms\Models\Page;
use Mcc\Laravelcms\Models\PageLayouts;
use Mcc\Laravelcms\Models\RowLayout;
use Mcc\Laravelcms\Models\RowPage;
use Mcc\Laravelcms\Models\Widget;
use Mcc\Laravelcms\Requests\PageSaveRequest;
use Mcc\Laravelcms\Models\RowWidget;
use Mcc\Laravelcms\Models\RowWidgetAttribute;
use Mcc\Laravelcms\Models\RowLocation;
use Mcc\Laravelcms\Models\LocationWidget;
use Mcc\Laravelcms\Models\WidgetValue;

class PageController extends Controller
{

  public function index() {
    $pages = Page::with('layout')->paginate();
    return view('laravelcms::admin.page.index',compact('pages'));
  }

  public function add(Page $page) {
    // dd(123123);
    $layouts = PageLayouts::getLayouts();
    return view('laravelcms::admin.page.add',compact('layouts'));
  }

  public function layouts() {
    $layouts      = PageLayouts::getLayouts();
    $rows_layouts = RowLayout::all()->toArray();
    $response = [
      'layouts'      => $layouts,
      'rows_layouts' => $rows_layouts,
      'status'       => true
    ];
    return response()->json($response);
  }

  public function form() {
    return view('laravelcms::admin.page.form');
  }

  public function store() {
    // dd($_FILES);
    // dd($_POST);
    $response  = [
      'status' => false
    ];
    $page_id   = intval(Input::post('db_page_id'));
    if($page_id) {
      $page = Page::find($page_id);
      $page->fill(Input::post('page'));
    }
    else {
      $page = new Page(Input::post('page'));
    }
    // geting unique url
    $page->getUniqueSlug();

    if($page->save()) {
      $response['status']  = true;
    }

    $rows = Input::post('rows');
    // dd($rows);
    foreach($rows as $key => $row):
      // dd($row);
      $rowPage = $row['db_row_id'] ? RowPage::find($row['db_row_id']) : new RowPage();
      $rowPage->page_id = $page->id;
      $rowPage->row_id  = $row['row_id'];
      $rowPage->order   = $key;
      $rowPage->save();
      // dd($rowPage);
      $cols = aI($row,'cols',[]);
      foreach($cols as $col_key => $col) {
        // dd($col);
        $rowLocation = $col['db_loc_id'] ? RowLocation::find($col['db_loc_id']) : new RowLocation();
        $rowLocation->order = $col_key;
        $rowLocation->loc_id = $col['loc_id'];
        $rowLocation->row_page_id = $rowPage->id;
        $rowLocation->save();
        // dd($col);
        $widgets      = aI($col,'widgets',[]);
        foreach ($widgets as $widget_order => $widget) {
          $db_widget_id                     = intval($widget['db_widget_id']);
          $locationWidget                   = $db_widget_id ? LocationWidget::find($db_widget_id) : new LocationWidget();
          $locationWidget->row_location_id  = $rowLocation->id;
          $locationWidget->widget_id        = $widget['widget_id'];
          $locationWidget->design_options   = $col['design_options'];
          $locationWidget->order            =  $widget_order;
          // dd($locationWidget);
          $locationWidget->save();
          // dd($rowWidget);
          $attributes = aI($widget,'attributes',[]);
          foreach($attributes as $attribute) {
            // dd($attribute);
            $widgetValue                      = new WidgetValue();
            $widgetValue->location_widget_id  = $locationWidget->id;
            $widgetValue->attribute_id        = $attribute['id'];
            if($attribute['type'] == 'text')
              $widgetValue->value_text        = $attribute['value'];
            else
              $widgetValue->value_string      = $attribute['value'];
            $widgetValue->save();
            // dd($widgetValue);
          }
        }
      }
    endforeach;

    // request()->session()->flash('success','Page has been created successfully');
    // return redirect()->to('pages');
    return response()->json($response);
  }

  public function update(Page $page,PageSaveRequest $request) {
    $data = Input::all();
    if($page->title != Input::post('title')) {
      $page->getUniqueSlug();
      $data['uri'] = $page->uri;
    }
    $page->update($data,['timestamps'=>true]);

    $request->session()->flash('success','Page has been updated successfully');

    return redirect()->to('pages');
  }

  public function edit(Page $page) {
    $layouts = PageLayouts::getLayouts();
    return view('laravelcms::admin.page.edit',compact('layouts','page'));
  }

  public function destroy(Page $page) {
    // deleteing record from table
    $page->delete();

    request()->session()->flash('success','Page has been deleted successfully');
    return redirect()->to('pages');
  }


  public function visibility(Page $page) {
    $response['status']  = false;
    $response['message'] = '';
    $page->active = !$page->active;
    if($page->save()) {
      $response['status'] = true;
      if($page->active)
        $response['message'] = 'Page activated successfully';
      else
        $response['message'] = 'Page deactivated successfully';
    }
    return response()->json($response);
    // request()->session()->flash('success','Page status has been updated successfully');
    //
    // return redirect()->to('pages');
  }

  public function list()
  {
    return view('laravelcms::admin.page.list');
  }

  public function listing($page,$perpage)
  {
    $offset = $page * $perpage;
    $response = [
      'result' => Page::offset($offset)->limit($perpage)
      ->with('layout:id,name')
      ->get()->toArray(),
      'total'  => Page::count(),
      'status' => true
    ];
    // dd($response);
    return response()->json($response);
  }

  public function widgettemplate() {
    return view('laravelcms::admin.page.widget');
  }

  public function widgetsettings() {
    return view('laravelcms::admin.page.widgetsettings');
  }

  public function getpage($page_id) {
    $page = Page
    ::with(
      'rows','rows.locations',
      'rows.layout',
      'rows.locations.widgets',
      'rows.locations.widgets.widget',
      'rows.locations.widgets.widgetValues',
      'rows.locations.widgets.widgetValues.attribute'
      )
    ->find($page_id)
    ->toArray()
    ;
    $response['success'] = true;
    $response['page'] = $page;
    return response()->json($page);
  }
}
