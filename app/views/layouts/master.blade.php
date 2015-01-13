<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Blog Demo</title>

        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/bootstrap-theme.min.css')}}
        {{HTML::style('css/styles.css')}}
        {{HTML::style('css/datepicker3.css')}}

        {{HTML::script('js/jquery.min.js')}}
        {{HTML::script('js/bootstrap.min.js')}}
        {{HTML::script('js/bootstrap-datepicker.js')}}


    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{URL::asset('/')}}">Tìm bạn</a>
                </div>

                <ul class="nav navbar-nav">
                    @foreach (Goal::all() as $goal)
                        <li>
                            <a class="nowrap" href="{{URL::asset('/goal/'. $goal->id) }}">{{ $goal->name }}</a>
                        </li>
                    @endforeach

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li role="presentation" class="dropdown nav nav-pills pull-right">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{URL::asset('/logout') }}" class="active">Logout</a>
                                </li>
                            </ul>
                        </li>

                    @else

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li style="display: inline-flex">
                                {{HTML::link('/login', 'Login')}} {{HTML::link('/register', 'Register')}}
                            </li>
                        </ul>

                    @endif
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <!-- <div class="content col-xs-8"> -->

                @if($message = Session::get('message'))
                    <div class="alert alert-danger">{{ $message }}</div>
                @endif

                @yield('content')

                <!-- </div> -->

                <!-- <div class="sidebar col-xs-4">
                    //slide
                </div> -->
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} <a href="#">binhhc</a>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({

        });
    });
</script>

