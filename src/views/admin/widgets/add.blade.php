@extends('laravelcms::admin.layouts.angular')

@section('breadcrumb')
  @include('laravelcms::admin.breadcrumbs',[
  'prev_link_href'=>'widgets',
  'prev_link_title'=>'Widgets',
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

  <div ng-app="widget">

      <toaster-container>
      </toaster-container>

      <div ui-view="main">

      </div>

  <div>
@endsection

@section('scripts')
  <script src="<?= url('/') ?>/js/modules/admin/widgets/app.js" type="text/javascript"></script>
  <script src="<?= url('/') ?>/js/modules/admin/widgets/controllers.js" type="text/javascript"></script>
  <script src="<?= url('/') ?>/js/modules/admin/widgets/service.js" type="text/javascript"></script>
  <script src="<?= url('/') ?>/js/modules/admin/widgets/factory.js" type="text/javascript"></script>
@endsection
