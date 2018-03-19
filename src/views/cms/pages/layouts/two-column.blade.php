<?php
use Mcc\Laravelcms\Models\Page;
?>

@extends('laravelcms::cms.pages.main')

@section('content')
<div class="container">
  <div class="col-lg-12">
    <div class="col-lg-3">
      @foreach(Page::$positions['left'] as $left)
        {{ $left }}
      @endforeach
    </div>
    <div class="col-lg-9">
      @foreach(Page::$positions['center'] as $center)
        {{ $center }}
      @endforeach
    </div>
  </div>
</div>
@endsection
