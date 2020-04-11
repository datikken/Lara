<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Admin</title>
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    @include('components.styles.style')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<div class="page_content">

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Printers</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">{{Auth::user()->name}}</a>
        </li>
    </ul>
</nav>

<div class="container-fluid" style="margin-top:40px">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">

                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link active" href="#">--}}
                            {{--<span data-feather="home"></span>--}}
                            {{--Dashboard <span class="sr-only">(current)</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file"></span>--}}
                            {{--Orders--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                        <a style="float: right;" href="{{route('adminCreateProductForm')}}" class="btn btn-outline-primary">Add</a>
                    </li>

                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="users"></span>--}}
                            {{--Customers--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="bar-chart-2"></span>--}}
                            {{--Reports--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="layers"></span>--}}
                            {{--Integrations--}}
                        {{--</a>--}}
                    {{--</li>--}}

                </ul>

                {{--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
                    {{--<span>Saved reports</span>--}}
                    {{--<a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">--}}
                        {{--<span data-feather="plus-circle"></span>--}}
                    {{--</a>--}}
                {{--</h6>--}}
                {{--<ul class="nav flex-column mb-2">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Current month--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Last quarter--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Social engagement--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">--}}
                            {{--<span data-feather="file-text"></span>--}}
                            {{--Year-end sale--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            {{--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">--}}
                {{--<h1 class="h2">Admin</h1>--}}
                {{--<div class="btn-toolbar mb-2 mb-md-0">--}}
                    {{--<div class="btn-group mr-2">--}}
                        {{--<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>--}}
                        {{--<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>--}}
                    {{--</div>--}}
                    {{--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
                        {{--<span data-feather="calendar"></span>--}}
                        {{--This week--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}

            @yield('center')

        </main>
    </div>
</div>

@include('components.scripts.scripts')

</div>
</html>