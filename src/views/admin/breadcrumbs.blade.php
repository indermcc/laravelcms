<div class="dash-br-div">
    <ul class="breadcrumb">
        <li class="active">
            <img src="{{ url('/') }}/images/dashboard/home.png">
            <a href="/">Home</a></li>
        <li>
          <a href="{{ route($prev_link_href) }}">{{ $prev_link_title }}</a>
        </li>
        @if($current_page)
        <li>
            <a href="javascript:void(0)">{{ $current_page }}</a>
        </li>
        @endif
    </ul>
</div>
