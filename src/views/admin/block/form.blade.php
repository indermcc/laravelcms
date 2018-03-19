<div class="col-lg-12">

  <ul class="nav nav-tabs">
    @foreach($blocks as $key => $block)
    <?php
    $class   = "active";
    $title   = "Main Block Detail";
    $add_tab = true;
    $href    = "#home";
    if($key!=0):
      $class   = "";
      $title   = "Block Detail";
      $add_tab = false;
      $href    = "#block".($key+1);
    endif;
    ?>
    <li class="{{ $class }}">
      <a data-toggle="tab" href="{{ $href }}">
        {{ $title }}
        @if($key==0)
        <span class="glyphicon glyphicon-plus custom_glyphicon"></span>
        @endif
      </a>
    </li>
    @endforeach
  </ul>

  <div class="tab-content">
    @foreach($blocks as $key => $block)
    <?php
    $id    = "home";
    $class = "in active";
    $index = $block->id ? $block->id : $key+1;
    if($key!=0):
      $id    = "block".($key+1);
      $class = "";
    endif;
    ?>
      <div id="{{ $id }}" class="tab-pane fade {{ $class }}">
        @include('laravelcms::admin.block.formpartial',['index'=>$index,'block'=>$block])
      </div>
    @endforeach
  </div>

  <div class="form-group">
    {{ Form::submit('Submit',['class'=>'form-control']) }}
  </div>

</div>


@section('scripts')
<script src="<?= url('/') ?>/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<script type="text/javascript">
  var page = parseInt( {!! $page->id !!} );
  tinymce.init({
    selector:'textarea',
  });
</script>
<script type="text/javascript" src="{{ asset('js/modules/admin/blocks/form.js') }}"></script>
@endsection
