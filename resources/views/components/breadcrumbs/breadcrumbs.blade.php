<div class="breadcrumb">
    <div class="breadcrumb_wrap">
        @foreach($crumbs as $crumb)
            <a href="{{$crumb['url']}}" class="breadcrumb_item">
                <span class="breadcrumb_item_inner">{{ $crumb['title'] }}</span>
                <span class="breadcrumb_arrow"></span>
            </a>
        @endforeach
    </div>
</div>
