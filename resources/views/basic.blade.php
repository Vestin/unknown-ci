<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{ asset('bootstrap-3.3.7-dist/css/bootstrap.css') }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    @yield('head')
</head>
<body>
@component('main-menu')
@endcomponent
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">

            @component('side-menu')
            @endcomponent
        </div>
        <div class="col-md-10">
            @component('status-message')
            @endcomponent
            @component('error')
            @endcomponent

            @yield('content')
        </div>
    </div>

</div>
</body>

@yield('script')
</html>
