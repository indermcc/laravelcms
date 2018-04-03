<form role="form" novalidate="novalidate" ng-submit="save()">

  <div class="form-group">
    {{ Form::label('name',null,['class'=>'control-label'])}}
    {{ Form::text('name',$model->name,['class'=>'form-control','required'=>'required','ng-model' => 'service.widget.name'])}}
  </div>


  <div class="form-group">
    {{ Form::label('description',null,['class'=>'control-label'])}}
    {{ Form::textarea('description',
    $model->description,
    [
    'class'=>'form-control',
    'ng-model'   => 'service.widget.description',
    'ui-tinymce' => "tinymceOptions",
    'required'   => 'required'
    ])}}
  </div>

  <div class="form-group">
    {{ Form::label('Category',null,['class'=>'control-label'])}}
    <select class="form-control" name="layout_id" ng-model="service.widget.category_id" required="required">
      <option value="">Select</option>
      <option ng-repeat="category in categoryService.categories" value="<% category.id %>">
        <% category.name %>
      </option>
    </select>
  </div>

  <div class="form-group">
    {{ Form::label('layout',null,['class'=>'control-label'])}}
    {{ Form::textarea(
      'layout',
      $model->layout,
      ['class'=>'form-control',
      'ng-model' => 'service.widget.layout',
      'required'=>'required',
      'ui-ace'
      ])}}
  </div>


  <div class="form-group">
    {{ Form::label('active',null,['class'=>'control-label'])}}
    <div class="">
      Yes
      {{ Form::radio('active',1,null,['ng-model' => 'service.widget.active','required'=>'required']) }}
      No
      {{ Form::radio('active',0,null,['ng-model' => 'service.widget.active','required'=>'required']) }}
    </div>
  </div>

  <div class="form-group">
    <a ui-sref="listing" class="btn btn-danger">Cancel</a>
    {{ Form::button('save',['class'=>'btn btn-primary','type' => 'submit','ladda'=>'service.isSaving'])}}
  </div>

</form>


<div class="form well clearfix" ng-if="attribute">
  <h3>Attribute</h3>
  <form role="form" novalidate="novalidate" ng-submit="tmpSave(attribute)">
    <div class="col-lg-6">
      <div class="form-group">
        {{ Form::label('name',null,['class'=>'control-label'])}}
        {{ Form::text('name',null,['class'=>'form-control','ng-model'=>'attribute.name','required'=>'required'])}}
      </div>
      <div class="form-group">
        {{ Form::label('key',null,['class'=>'control-label'])}}
        {{ Form::text('key',null,['class'=>'form-control','ng-model'=>'attribute.key','required'=>'required'])}}
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        {{ Form::label('type',null,['class'=>'control-label'])}}
        {{ Form::select('type',['varchar'=>'varchar','text'=>'text','file'=>'file'],null,['class'=>'form-control','ng-model'=>'attribute.type'])}}
      </div>

      <div class="form-group">
        {{ Form::label('haveSingleValue',null,['class'=>'control-label'])}}
        <div class="">
          Yes
          {{ Form::radio('active',1,false,['ng-model'=>'attribute.haveSingleValue']) }}
          No
          {{ Form::radio('active',0,false,['ng-model'=>'attribute.haveSingleValue']) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('required',null,['class'=>'control-label'])}}
        <div class="">
          Yes
          {{ Form::radio('Yes',1,false,['ng-model'=>'attribute.required']) }}
          No
          {{ Form::radio('No',0,false,['ng-model'=>'attribute.required']) }}
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        {{ Form::button('Save',['class'=>'btn btn-primary','type'=>'submit'])}}
      </div>
    </div>
  </form>
</div>

<caption>Attributes <span ng-click='addAttribute()' class="glyphicon glyphicon-plus custom_glyphicon"></span></caption>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Key</th>
      <th>Type</th>
      <th>Single Value</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="(key,row) in service.attributes">
      <th> <% row.name %> </th>
      <th> <% row.key %> </th>
      <th> <% row.type %> </th>
      <th> <% row.haveSingleValue %> </th>
      <th>
        {{ Form::button('Edit',['class'=>'btn btn-info','ng-click'=>'editAttribute(key,row)'])}}
        {{ Form::button('Delete',['class'=>'btn btn-danger','ng-click'=>'deleteAttribute(key,row)','ladda'=>'service.isDeleteing'])}}
      </th>
    </tr>
  </tbody>
</table>
