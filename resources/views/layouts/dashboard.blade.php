<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard --</title>
    <link rel="stylesheet" href="{{ url()->asset('/css/app.css') }}">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</head>

<body class="p-0 is-dashboard">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 col-md-1">
                <nav class="main-menu">
                    <ul>
                        <li>
                            <a href="/dashboard">
                                <i class="fa fa-home fa-2x"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="/project">
                                <i class="fa fa-music	 fa-2x"></i>
                                <span class="nav-text">
                                    Project
                                </span>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder-open fa-2x"></i>
                                <span class="nav-text">
                                    Pages
                                </span>
                            </a>

                        </li>
                        <li>
                            <a href="/order">
                                <i class="fa fa-table fa-2x"></i>
                                <span class="nav-text">
                                    Order
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="/event">
                                <i class="fa fa-table fa-2x"></i>
                                <span class="nav-text">
                                    Timetable
                                </span>
                            </a>
                        </li>


                        {{--        user acc name--}}
                        {{--        <li>--}}
                        {{--            <a href="">--}}
                        {{--                <span class="next-text">--}}
                        {{--                    {{ Auth::user()->name }}--}}
                        {{--                </span>--}}
                        {{--            </a>--}}
                        {{--        </li>--}}

                    </ul>

                    <ul class="logout">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off fa-2x"></i>
                                <span class="nav-text">
                                    {{ __('Logout') }}
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <div>


                    </div>

                </nav>
            </div>
            <div class="col-12 col-md-11">
                <div class="dashboard-content">

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Find stage',
        ajax: {
            url: '/band-find-stage',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log(data)

                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: false

        }
    });
    </script>
</body>

</html>