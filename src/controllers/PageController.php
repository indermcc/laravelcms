<?php

namespace Mcc\Laravelcms\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

use Mcc\Laravelcms\Models\Page;
use Mcc\Laravelcms\Models\PageLayouts;
use Mcc\Laravelcms\Requests\PageSaveRequest;


class PageController extends Controller
{

  public function index() {
    $pages = Page::with('layout')->paginate();
    // dd($pages);
    return view('laravelcms::admin.page.index',compact('pages'));
  }

  public function add() {
    $layouts = PageLayouts::getLayouts();
    return view('laravelcms::admin.page.add',compact('layouts'));
  }

  public function store(PageSaveRequest $request) {
    // dd($page);
    $page = new Page(Input::all());

    // geting unique url
    $page->getUniqueSlug();

    $page->save();

    $request->session()->flash('success','Page has been created successfully');

    return redirect()->to('pages');
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

}
