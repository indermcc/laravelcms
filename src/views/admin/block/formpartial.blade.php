<br/>

<div class="form-group">
  {{ Form::label('title',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][title]",$block->title,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('description',null,['class'=>'control-label'])}}
  {{ Form::textarea("form[$index][description]",$block->description,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('layout_id',null,['class'=>'control-label'])}}
  {{ Form::select("form[$index][layout_id]",[null=>'Please Select'] + $layouts,$block->layout_id,['class'=>'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('active',null,['class'=>'control-label'])}}
  <div class="">
    Yes
    {{ Form::radio("form[$index][active]",1,$block->active == 1 ? true : false) }}
    No
    {{ Form::radio("form[$index][active]",0,$block->active == 0 ? true : false) }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('type',null,['class'=>'control-label'])}}
  {{ Form::select("form[$index][type]",[null=>'Please Select'] + ['left'=>'left','center'=>'center','right'=>'right'],$block->type,['class'=>'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('image thumbnail',null,['class'=>'control-label'])}}
  {{ Form::file("form[$index][image_thumbnail]",$block->image_thumbnail,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('image',null,['class'=>'control-label'])}}
  {{ Form::file("form[$index][image]",$block->image,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('image link',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][image_link]",$block->image_link,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('image alt',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][image_alt]",$block->image_alt,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('image position',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][image_position]",$block->image_position,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('btn text',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][btn_text]",$block->btn_text,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('btn class',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][btn_class]",$block->btn_class,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('btn link',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][btn_link]",$block->btn_link,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('btn position',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][btn_position]",$block->btn_position,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('video',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][video]",$block->video,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('video source',null,['class'=>'control-label'])}}
  {{ Form::select("form[$index][video_source]",['vimeo'=>'vimeo','youtube'=>'youtube'],$block->video_source,['class'=>'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('video position',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][video_position]",$block->video_position,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('map url',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][map_url]",$block->map_url,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('map position',null,['class'=>'control-label'])}}
  {{ Form::text("form[$index][map_position]",$block->map_position,['class'=>'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('order',null,['class'=>'control-label'])}}
  {{ Form::number("form[$index][order]",$block->order,['class'=>'form-control'])}}
</div>
{{ Form::hidden("form[$index][page_id]",$page->id) }}
