<!DOCTYPE html>
<html lang="ar">
<head>
    @include('layouts.head')
    @yield('styles')
</head>
<body class="scroller">


<div class="page-wrapper">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('scripts')
</div>
</body>

</html>
