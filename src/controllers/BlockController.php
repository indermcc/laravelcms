<?php

namespace Mcc\Laravelcms\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

use Mcc\Laravelcms\Models\Block;
use Mcc\Laravelcms\Models\Page;
use Mcc\Laravelcms\Models\BlockLayouts;
use Mcc\Laravelcms\Requests\BlockSaveRequest;

class BlockController extends Controller
{

  public function index() {
    $blocks = Block::where('parent_id',null)->with('layout')->paginate(10);
    return view('laravelcms::admin.block.index',compact('blocks'));
  }

  public function add(Page $page) {
    $blocks = [];
    if(old('form'))
      foreach(old('form') as $form)
        $blocks[]  = new Block($form);
    else
      $blocks[]  = new Block;
    $layouts = BlockLayouts::getLayouts();
    return view('laravelcms::admin.block.add',compact('layouts','blocks','page'));
  }

  public function form() {
    $index = request('index');
    $page  = Page::find(request('page'));
    $layouts = BlockLayouts::getLayouts();
    $block   = new Block;
    return view('laravelcms::admin.block.formpartial',compact('layouts','index','block','page'));
  }

  public function store(Page $page,BlockSaveRequest $request) {
    $parent_id = 0;
    foreach(Input::post('form',[]) as $form) {
      $block = new Block($form);
      if($parent_id) {
        $block->parent_id = $parent_id;
      }
      $block->save();
      $parent_id = $block->id;
    }

    $request->session()->flash('success','Block has been created successfully');

    return redirect()->to('blocks');
  }

  public function update(Block $block,Page $page,BlockSaveRequest $request) {

    $updated_and_inserts_ids = [];
    foreach(Input::post('form',[]) as $key => $form) {
      if($block->id == $key)
        $updateblock = Block::find($key);
      else{
        $updateblock = Block::where('id',$key)->where('parent_id',$block->id)->first();
      }
      if($updateblock) {
        $updated_and_inserts_ids[] = $updateblock->id;
        $updateblock->update($form);
      }
      else {
        $updateblock = new Block($form);
        $updateblock->parent_id = $block->id;
        $updateblock->save();
      }
    }

    $request->session()->flash('success','Block has been updated successfully');

    return redirect()->to('blocks');
  }

  public function edit(Block $block,Page $page) {
    $blocks   = [];
    $blocks[] = $block;
    foreach($block->childBlocks as $block) {
      $blocks[] = $block;
    }
    // dd($blocks);
    $layouts = BlockLayouts::getLayouts();
    return view('laravelcms::admin.block.edit',compact('layouts','blocks','page'));
  }

  public function destroy(Block $block) {
    // deleteing record from table
    $page->delete();

    request()->session()->flash('success','Block has been deleted successfully');
    return redirect()->to('blocks');
  }


  public function visibility(Block $block) {
    $block->active = !$block->active;
    // dd($block->);
    $block->save();
    request()->session()->flash('success','Block status has been updated successfully');

    return redirect()->to('blocks');
  }


}
