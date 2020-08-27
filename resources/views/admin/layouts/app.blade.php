<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
    @yield('style')
</head>
<body>
<!-- Header -->
@include('admin.layouts.header')
<section id="main">
    @include('admin.layouts.sidebar')
    <section id="content" >
        @yield('content')
    </section>
    @include('admin.layouts.footer')
</section>

@include('admin.layouts.scripts')
@yield('scripts')
</body>
</html>
