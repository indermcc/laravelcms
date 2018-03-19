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
        <th>Order</th>
        <th>Updated At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse($blocks as $block)
          <tr>
            <td>{{ $block->title }}</td>
            <td>{{ $block->description }}</td>
            <td>{{ $block->layout->name }}</td>
            <td>{{ $block->order }}</td>
            <td>{{ getFormatedDate($block->updated_at) }}</td>
            <td>
              <a href="{{ route('blocks.switchvisibility',['page'=>$block->id]) }}">
                <button type="button" class="btn btn-primary" name="button">
                  @if($block->active)
                  <span class="glyphicon glyphicon-eye-open"></span>
                  @else
                  <span class="glyphicon glyphicon-eye-close"></span>
                  @endif
                </button>
              </a>
              <a href="{{ route('blocks.edit',[ 'block' => $block->id,'page' => $block->page_id ]) }}">
                <button type="button" class="btn btn-primary" name="button">
                  <span class="glyphicon glyphicon-edit"></span>
                </button>
              </a>
              {!! Form::open(['method' => 'DELETE','route' => ['blocks.destroy', $block->id],'style'=>'display:inline']) !!}
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

  {{ $blocks->render() }}
@endsection
