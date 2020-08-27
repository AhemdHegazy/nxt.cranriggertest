<!DOCTYPE html>
<html lang="ar">
<head>
    @include('layouts.head')
    @yield('styles')
</head>
<body id="home" class="home page-template page-template-page-templates page-template-template-home page-template-page-templatestemplate-home-php page page-id-3188 header-center-menu has-header-topbar has-header-search footer-default has-site-logo header-section-show has-blog-sidebar wpb-js-composer js-comp-ver-5.6 vc_responsive" data-spy="scroll" data-target=".navbar" data-offset="100">
@include('layouts.header')
    @yield('content')
@include('layouts.footer')
@include('layouts.scripts')
@yield('scripts')
</body>
</html>
