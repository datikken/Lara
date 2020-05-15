<div class="breadcrumb">
    <div class="breadcrumb_wrap">
        @foreach($crumbs as $crumb)
            <div class="breadcrumb_item">
                    <span class="breadcrumb_item_inner">{{ $crumb }}</span>
                    <span class="breadcrumb_arrow"></span>
            </div>
        @endforeach
    </div>
</div>
