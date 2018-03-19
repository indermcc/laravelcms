<?php
// dd($layouts);
?>
<div class="col-lg-10">

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Basic Detail</a></li>
    <li><a data-toggle="tab" href="#menu1">Seo Detail</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <br/>

        <div class="form-group">
          {{ Form::label('title',null,['class'=>'control-label'])}}
          {{ Form::text('title',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
          {{ Form::label('description',null,['class'=>'control-label'])}}
          {{ Form::textarea('description',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
          {{ Form::label('banner',null,['class'=>'control-label'])}}
          {{ Form::file('banner',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
          {{ Form::label('layout_id',null,['class'=>'control-label'])}}
          {{ Form::select('layout_id',[null=>'Please Select'] + $layouts,null,['class'=>'form-control']) }}
        </div>

        <div class="form-group">
          {{ Form::label('active',null,['class'=>'control-label'])}}
          <div class="">
            Yes
            {{ Form::radio('active',1,null) }}
            No
            {{ Form::radio('active',0,null) }}
          </div>
        </div>

    </div>

    <div id="menu1" class="tab-pane fade">
      <br/>
        <div class="form-group">
          {{ Form::label('uri',null,['class'=>'control-label'])}}
          {{ Form::text('uri',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
          {{ Form::label('meta_title',null,['class'=>'control-label'])}}
          {{ Form::text('meta_title',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
          {{ Form::label('meta_description',null,['class'=>'control-label'])}}
          {{ Form::textarea('meta_description',null,['class'=>'form-control'])}}
        </div>
    </div>

    <div class="form-group">
      {{ Form::submit('Submit',['class'=>'form-control']) }}
    </div>

  </div>
</div>
