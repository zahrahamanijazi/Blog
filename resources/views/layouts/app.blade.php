
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html, body {
            /*color: black;*/
            background-color: #f8d7da;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            /*font-weight: 200;*/
            /*height: 100%;*/
            /*margin: 0;*/
            /*boeder-width:5px 10px;*/
            /*width: 100%;*/

            padding: 0px 20px 30px; /*space from content and border*/

            /*border-width: thin;*/
            /*overflow:hidden;*/
            /*display:block;*/

        }

hr{
    border: solid black;
}

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        h1,h3,h4,h2,h6{
            text-align: center;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
    <div id="app">


        <main class="py-4">

            @include('nav.navbar')
            <br><br>
            @yield('content')

        </main>
    </div>

</body>
</html>
