@extends('laravelcms::admin.layouts.angular')

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
  <!-- <div class="form">
    {{ Form::open(['method' => 'post','enctype'=>'multipart/form-data']) }}

    @include('laravelcms::admin.page.form')

    {{ Form::close() }}
  </div> -->
  <div ng-app="page">

      <toaster-container>
      </toaster-container>

      <div ui-view="main">

      </div>

  <div>

@endsection

@section('scripts')
<script src="<?= url('/') ?>/js/angular/angular-drag-and-drop-lists.min.js" type="text/javascript"></script>
<script src="<?= url('/') ?>/js/modules/admin/pages/app.js" type="text/javascript"></script>
<script src="<?= url('/') ?>/js/modules/admin/pages/controllers.js" type="text/javascript"></script>
<script src="<?= url('/') ?>/js/modules/admin/pages/directive.js" type="text/javascript"></script>
<script src="<?= url('/') ?>/js/modules/admin/pages/service.js" type="text/javascript"></script>
<script src="<?= url('/') ?>/js/modules/admin/pages/factory.js" type="text/javascript"></script>
<script src="<?= url('/') ?>/js/modules/admin/widgets/factory.js" type="text/javascript"></script>
<script src="<?= url('/') ?>/js/modules/admin/pages/filter.js" type="text/javascript"></script>
@endsection

@section('css')
@endsection
