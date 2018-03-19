@extends('main')

@section('breadcrumb')
  @include('laravelcms::admin.breadcrumbs',[
  'prev_link_href'=>'pages',
  'prev_link_title'=>'Pages',
  'current_page'   => null
  ])
@endsection

@section('content')

  @if(session()->has('success'))
  <p class="alert alert-success">{{ session()->get('success') }}</p>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Layout</th>
        <th>Updated At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse($pages as $page)
          <tr>
            <td>{{ $page->title }}</td>
            <td>{{ $page->description }}</td>
            <td>{{ $page->layout->name }}</td>
            <td>{{ getFormatedDate($page->updated_at) }}</td>
            <td>
              <a href="{{ route('page.switchvisibility',['page'=>$page->id]) }}">
                <button type="button" class="btn btn-primary" name="button">
                  @if($page->active)
                  <span class="glyphicon glyphicon-eye-open"></span>
                  @else
                  <span class="glyphicon glyphicon-eye-close"></span>
                  @endif
                </button>
              </a>
              <a href="{{ route('page.edit',[ 'id' => $page->id ]) }}">
                <button type="button" class="btn btn-primary" name="button">
                  <span class="glyphicon glyphicon-edit"></span>
                </button>
              </a>
              {!! Form::open(['method' => 'DELETE','route' => ['page.destroy', $page->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @empty
          <tr>
            <td rowspan="5">No Data Found.</td>
          </tr>
        @endforelse
    </tbody>
  </table>

  {{ $pages->render() }}
@endsection
