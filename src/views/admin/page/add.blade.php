@extends('main')

@section('breadcrumb')
  @include('laravelcms::admin.breadcrumbs',[
  'prev_link_href'=>'pages',
  'prev_link_title'=>'Pages',
  'current_page'   => 'Add'
  ])
@endsection

@section('content')

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <div class="form">
    {{ Form::open(['method' => 'post','enctype'=>'multipart/form-data']) }}

    @include('laravelcms::admin.page.form')

    {{ Form::close() }}
  </div>
@endsection

@section('scripts')
  <script src="<?= url('/') ?>/js/tinymce/tinymce.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    tinymce.init({
      selector:'textarea',
    });
  </script>
@endsection
