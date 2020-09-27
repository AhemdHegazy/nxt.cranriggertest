<aside id="navigation">
    <div class="navigation__menu c-overflow">
        <ul>
            <li><a href="{{route('home.index')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'subject') == true)
            <li><a href="{{route('subjects.index')}}"><i class="fa fa-list"></i> Subjects </a> </li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'capacity') == true)
            <li><a href="{{route('capacities.index')}}"><i class="fa fa-list-alt"></i> Capacities </a> </li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'question') == true)
            <li><a href="{{route('questions.index')}}"><i class="fa fa-question-circle"></i> Questions </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'package') == true)
            <li><a href="{{route('packages.index')}}"><i class="fa fa-save"></i> Packages </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'post') == true)
            <li><a href="{{route('posts.index')}}"><i class="fa fa-newspaper-o"></i> Posts </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'testimonial') == true)
{{--
            <li><a href="{{route('orders.index')}}"><i class="zmdi zmdi-view-list"></i> Orders </a></li>
--}}
            <li><a href="{{route('testimonials.index')}}"><i class="fa fa-smile-o"></i> Testimonials </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'message') == true)
            <li><a href="{{route('contacts.index')}}"><i class="fa fa-envelope"></i>Contacts </a></li>
            @endif


            <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> Users </a></li>
            <li><a href="{{route('companies.index')}}"><i class="fa fa-object-group"></i> Companies </a></li>
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'country') == true)
            <li><a href="{{route('countries.index')}}"><i class="fa fa-globe"></i> Countries </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'coupon') == true)
            <li><a href="{{route('coupons.index')}}"><i class="zmdi zmdi-view-list"></i> Coupons </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'guideline') == true)
            <li><a href="{{route('guidelines.index')}}"><i class="fa fa-gears"></i>Guidelines </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'payment') == true)
            <li><a href="{{route('queryGet.index')}}"><i class="fa fa-money"></i>Payments </a></li>
            @endif

            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'admin') == true)
            <li><a href="{{route('admins.index')}}"><i class="fa fa-users"></i>Members </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'message') == true)
                <li><a href="{{route('chats.index')}}"><i class="fa fa-comments"></i>Messages </a></li>
            @endif
            @if(\App\Http\Controllers\HelperController::hasShow(auth('admin')->id(),'cms') == true)
            <li><a href="{{route('cms.index')}}"><i class="fa fa-code"></i>CMS </a></li>
            @endif
            <li><a href="{{route('copy.index')}}"><i class="fa fa-copyright"></i>Copy rights </a></li>
        </ul>
    </div>
</aside>
