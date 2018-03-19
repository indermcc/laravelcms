
<div class="form">
  <?php
  // dd($model);
  ?>
  <!-- {{ Form::model($model,['method' => 'post','enctype'=>'multipart/form-data','novalidate' => 'novalidate']) }} -->

  @include('laravelcms::admin.widgets.formpartial')

  <!-- {{ Form::close() }} -->
</div>
