<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
 


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 
 {!! Html::style('foundation-6.4.2-complete/css/foundation.css') !!}
 {!! Html::style('foundation-6.4.2-complete/css/app.css') !!}
 
 {!! Html::style('selectize/normalize.css') !!}
 {!! Html::style('selectize/stylesheet.css') !!}
 {!! Html::style('selectize/selectize.default.css') !!}
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 
 <!--  
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
       -->  


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    @yield('header')
    <!-- Styles -->
 
</head>
<body style="margin-top:0;">

















<!-- 
<div class="header">
  <div class="container"> <a class="navbar-brand" href="index.html"><i class="fa fa-paper-plane"></i> </a>
    <div class="menu"> <a class="toggleMenu" href="#"><img src="images/nav_icon.png" alt="" /> </a>
      <ul class="nav" id="nav">
        <li class="current"><a href="{{url('/home')}}">Chef In House</a></li>


                                @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

        <div class="clear"></div>
      </ul>
      
    </div>
  </div>
</div>

-->
 

        @yield('content')
 
        
        

{!! Html::script('foundation-6.4.2-complete/js/vendor/jquery.js') !!} 
{!! Html::script('foundation-6.4.2-complete/js/vendor/what-input.js') !!}
{!! Html::script('foundation-6.4.2-complete/js/vendor/foundation.js') !!}
{!! Html::script('foundation-6.4.2-complete/js/app.js') !!} 


{!! Html::script('selectize/selectize.js') !!} 
{!! Html::script('selectize/index.js') !!} 

{!! Html::script('js/order.js') !!} 

 <!--  
<div class="footer">
  <div class="footer_bottom">
    <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
    <div class="copy">
 <footer>@yield('footer')</footer>
    </div>
  </div>
</div>
-->

    <!-- Scripts -->

</body>
</html>
