<?php

// dd(request());

Theme::set('admin');

Route::group(['middleware' => 'web'], function () {

  Route::get('testing',function() {
    if(Theme::get()) {
      return view("laravelcms::".Theme::get().".test");
    }
    else {
      return view('laravelcms::test');
    }
  });

  // routes for pages controller
  Route::get('/pages','Mcc\Laravelcms\Controllers\PageController@index')->name('pages');
  Route::get('/pages/add','Mcc\Laravelcms\Controllers\PageController@add')->name('page.add');
  // Route::post('/pages/add','Mcc\Laravelcms\Controllers\PageController@store')->name('page.save');
  Route::post('/pages/store','Mcc\Laravelcms\Controllers\PageController@store')->name('page.save');
  Route::get('/pages/edit/{page}','Mcc\Laravelcms\Controllers\PageController@edit')->name('page.edit');
  Route::post('/pages/edit/{page}','Mcc\Laravelcms\Controllers\PageController@update')->name('page.update');
  Route::delete('/pages/delete/{page}','Mcc\Laravelcms\Controllers\PageController@destroy')->name('page.destroy');
  Route::get('/pages/visibility/{page}','Mcc\Laravelcms\Controllers\PageController@visibility')->name('page.switchvisibility');
  Route::get('/pages/list','Mcc\Laravelcms\Controllers\PageController@list')->name('page.listing');
  Route::get('/pages/listing/{page}/{perPage}','Mcc\Laravelcms\Controllers\PageController@listing')->name('page.listingdata');
  Route::get('/pages/layouts','Mcc\Laravelcms\Controllers\PageController@layouts')->name('page.layouts');
  Route::get('/pages/form','Mcc\Laravelcms\Controllers\PageController@form')->name('page.form');
  Route::get('/pages/widgettemplate','Mcc\Laravelcms\Controllers\PageController@widgettemplate')->name('page.form');
  Route::get('/pages/widgetsettings','Mcc\Laravelcms\Controllers\PageController@widgetsettings')->name('page.widgetsettings');

  // routes for block container
  Route::get('/blocks','Mcc\Laravelcms\Controllers\BlockController@index')->name('blocks');
  Route::get('/blocks/add/{page}','Mcc\Laravelcms\Controllers\BlockController@add')->name('blocks.add');
  Route::post('/blocks/add/{page}','Mcc\Laravelcms\Controllers\BlockController@store')->name('blocks.save');
  Route::get('/blocks/edit/{block}/{page}','Mcc\Laravelcms\Controllers\BlockController@edit')->name('blocks.edit');
  Route::post('/blocks/edit/{block}/{page}','Mcc\Laravelcms\Controllers\BlockController@update')->name('blocks.update');
  Route::delete('/blocks/delete/{block}','Mcc\Laravelcms\Controllers\BlockController@destroy')->name('blocks.destroy');
  Route::get('/blocks/visibility/{block}','Mcc\Laravelcms\Controllers\BlockController@visibility')->name('blocks.switchvisibility');
  Route::get('/blocks/form','Mcc\Laravelcms\Controllers\BlockController@form')->name('blocks.form');

  Route::get('/widgets','Mcc\Laravelcms\Controllers\WidgetController@index')->name('widgets');
  Route::get('/widgets/add/{widget?}','Mcc\Laravelcms\Controllers\WidgetController@add')->name('widgets.add');
  Route::get('/widgets/form','Mcc\Laravelcms\Controllers\WidgetController@form')->name('widgets.form');
  Route::post('/widgets/store/{widget?}','Mcc\Laravelcms\Controllers\WidgetController@store')->name('widgets.store');
  Route::get('/widgets/store/{widget}','Mcc\Laravelcms\Controllers\WidgetController@get')->name('widgets.get');
  Route::delete('/widgets/store/{type}/{option}','Mcc\Laravelcms\Controllers\WidgetController@destroy')->name('widgets.destroy');
  Route::get('/widgets/list','Mcc\Laravelcms\Controllers\WidgetController@list')->name('widgets.listing');
  Route::get('/widgets/listing/{page}/{perPage}','Mcc\Laravelcms\Controllers\WidgetController@listing')->name('widgets.listingdata');
  Route::get('/widgets/attributes/{widget}','Mcc\Laravelcms\Controllers\WidgetController@attributes')->name('widgets.attributes');
  Route::get('/widgets/listCategories','Mcc\Laravelcms\Controllers\WidgetController@listCategories');

  // route for cms
  Route::get('/{slug}','Mcc\Laravelcms\Controllers\CmsController@index');

});
