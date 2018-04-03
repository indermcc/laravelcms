<?php

namespace Mcc\Laravelcms\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcc\Laravelcms\Models\Widget;
use Mcc\Laravelcms\Models\WidgetAttribute;
use Mcc\Laravelcms\Models\WidgetCategory;
use Mcc\Laravelcms\Requests\WidgetRequest;
use Validator;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class WidgetController extends Controller
{

  public function index()
  {
    // dd(Widget::destroy(12));
    return view('laravelcms::admin.widgets.index');
  }

  public function list()
  {
    return view('laravelcms::admin.widgets.list');
  }

  public function listing($page,$perpage)
  {
    $offset = $page * $perpage;
    $response = [
      'result' => Widget::offset($offset)->limit($perpage)->get()->toArray(),
      'total'  => Widget::count(),
      'status' => true
    ];

    return response()->json($response);
  }

  public function add($widget=0)
  {
    return view('laravelcms::admin.widgets.add',compact('widget'));
  }

  public function form()
  {
    $model = new Widget();
    return view('laravelcms::admin.widgets.form',compact('model'));
  }

  public function store(Widget $widget)
  {
    // dd(request()->all());
    $response['success'] = true;
    $validator = Validator::make(request()->all(),(new WidgetRequest)->rules());
    if($validator->fails()) {
      $response['success'] = false;
      $errors = $validator->errors();
      $response['messages'] = "";
      foreach($errors->messages() as $error):
        foreach($error as $e):
          $response['messages'] .= $e;
        endforeach;
      endforeach;
    }
    else {
      // dd(request()->all());
      $widget->fill(request('widget'));

      if($widget->save())
        $response['messages'] = "Widget saved successfully";

      $attributes = request('attributes',null);
      if(!is_null($attributes) && !$attributes) {
        WidgetAttribute::where('widget_id',$widget->id)->delete();
      }
      else
      {
        $attributes = request('attributes',[]);
        foreach($attributes as $attribute) {
          $id = $attribute['id'];
          $attribute = array_diff_key($attribute,array_flip(['newObj','id']));
          if($id)
            $widgetAttribute = WidgetAttribute::find($id);
          else
            $widgetAttribute = new WidgetAttribute();
          $widgetAttribute->fill($attribute);
          $widgetAttribute->widget_id = $widget->id;

          $widgetAttribute->save();
        }
      }

      // creating widget layout

    }

    return response()->json($response);
  }

  public function get(Widget $widget) {
    $response = [
      'status'     => true,
      'widget'     => array_map('strval',$widget->getAttributes()),
      'attributes' => array_map(function($item){
        foreach($item as $k => $v) $item[$k] = strval($v);
        return $item;
      },$widget->attributes->toArray())
    ];
    return response()->json($response);
  }

  public function destroy($id,$type) {
    if($type == 'attribute')
      $model = WidgetAttribute::find($id);
    elseif($type == 'widget')
      $model = Widget::find($id);

    $response['status']  = false;

    if(!$model) {
      $response['message'] = 'Wrong request';
    }
    else {
      if($model->destroy($model->id)) {
        $response['status']  = true;
        $response['message'] = ucfirst($type).' deleted successfully';
      }
    }
    return response()->json($response);
  }

  public function attributes(Widget $widget) {
    $response = [
      'status'     => true,
      'attributes' => $widget->attributes->toArray()
    ];
    return response()->json($response);
  }

  public function listCategories() {
    $response = [
      'status'     => true,
      'categories' => WidgetCategory::all()->toArray(),
    ];

    return response()->json($response);
  }

}
