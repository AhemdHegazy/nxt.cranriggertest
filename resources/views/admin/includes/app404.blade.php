<!DOCTYPE html>
<html lang="en" style="background: #22313a">
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<!-- Mirrored from bootstrapsale.com/projects/maed/v1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Oct 2018 08:47:17 GMT -->
<head>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <link href="{{asset('css/ct-navbar.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    @yield('style')
</head>
<body>
<section id="main">
    <div class="container">
        @yield('content')
    </div>
</section>




<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/ct-navbar.js"></script>
<script type="text/javascript">
    function searchToggle(obj, evt){
        var container = $(obj).closest('.search-wrapper');
        if(!container.hasClass('active')){
            container.addClass('active');
            evt.preventDefault();
        }
        else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
            container.removeClass('active');
            // clear input
            container.find('.search-input').val('');
        }
    }
</script>
@yield('scripts')
</body>
</html>
