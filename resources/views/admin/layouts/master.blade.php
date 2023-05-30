
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('panel/assets/media/image/favicon.png') }}">
    <meta name="theme-color" content="#5867dd">
    <link rel="stylesheet" href="{{ asset('panel/vendors/bundle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('panel/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ url('panel/vendors/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ url('panel/vendors/vmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('panel/assets/css/app.css') }}" type="text/css">
</head>

<body class="small-navigation">

<!-- begin::navigation -->
@include('admin.layouts.navigation')
<!-- end::navigation -->

<!-- begin::header -->
@include('admin.layouts.header')
<!-- end::header -->

@livewireStyles

<!-- begin::main content -->
@yield('content')  {{-- page change in project --}}
<!-- end::main content -->


@livewireScripts
<!-- begin::footer -->
<script src="{{ url('panel/vendors/bundle.js') }}"></script>
<script src="{{ url('panel/vendors/slick/slick.min.js') }}"></script>
<script src="{{ url('panel/vendors/vmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/app.js') }}"></script>
<!-- end::footer -->

</body>
</html>
