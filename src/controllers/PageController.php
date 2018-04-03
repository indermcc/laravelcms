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

class PageController extends Controller
{

  public function index() {
    $pages = Page::with('layout')->paginate();
    // dd($pages);
    return view('laravelcms::admin.page.index',compact('pages'));
  }

  public function add() {
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
    // dd($_POST);
    // dd($_FILES);
    $response  = [
      'status' => false
    ];
    $page = new Page(Input::post('page'));

    // geting unique url
    $page->getUniqueSlug();

    if($page->save()) {
      $response['status']  = true;
    }

    $rows = Input::post('rows');
    // dd($rows);
    foreach($rows as $key => $row):
      // dd($row);
      $rowPage = new RowPage();
      $rowPage->page_id = $page->id;
      $rowPage->row_id  = $row['row_id'];
      $rowPage->order   = $key;
      $rowPage->save();
      $cols = aI($row,'cols',[]);
      foreach($cols as $col) {
        // dd($col);
        $widgets      = aI($col,'widgets',[]);
        foreach ($widgets as $widget) {
          // dd($widget);
          $rowWidget                 = new RowWidget();
          $rowWidget->page_row_id    = $rowPage->id;
          $rowWidget->widget_id      = $widget['widget_id'];
          $rowWidget->location_id	   = $col['loc_id'];
          $rowWidget->design_options = $col['design_options'];
          $rowWidget->save();
          // dd($rowWidget);
          $attributes = aI($widget,'attributes',[]);
          foreach($attributes as $attribute) {
            // dd($attribute);
            $widgetAttribute                  = new RowWidgetAttribute();
            $widgetAttribute->row_widget_id   = $rowWidget->id;
            $widgetAttribute->attribute_id    = $attribute['id'];
            if($attribute['type'] == 'text')
              $widgetAttribute->value_text    = $attribute['value'];
            else
              $widgetAttribute->value_string  = $attribute['value'];
            $widgetAttribute->save();
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
    $page->active = !$page->active;
    $page->save();

    request()->session()->flash('success','Page status has been updated successfully');

    return redirect()->to('pages');
  }

  public function list()
  {
    return view('laravelcms::admin.page.list');
  }

  public function listing($page,$perpage)
  {
    $offset = $page * $perpage;
    $response = [
      'result' => Page::offset($offset)->limit($perpage)->get()->toArray(),
      'total'  => Page::count(),
      'status' => true
    ];

    return response()->json($response);
  }

  public function widgettemplate() {
    return view('laravelcms::admin.page.widget');
  }

  public function widgetsettings() {
    return view('laravelcms::admin.page.widgetsettings');
  }

}
