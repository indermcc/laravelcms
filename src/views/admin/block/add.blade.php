@extends('main')

@section('breadcrumb')
  @include('laravelcms::admin.breadcrumbs',[
  'prev_link_href'=>'blocks',
  'prev_link_title'=>'Blocks',
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

    @include('laravelcms::admin.block.form')

    {{ Form::close() }}
  </div>
@endsection
