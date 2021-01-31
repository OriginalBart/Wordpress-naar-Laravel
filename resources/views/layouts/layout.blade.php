<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url()->asset('/css/app.css') }}">

</head>

<body @unless(empty($body_class)) class="{{$body_class}}" @endunless>
    @yield('nav')
    <main>
        @yield('content')
    </main>
    @include('includes.footer')

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>