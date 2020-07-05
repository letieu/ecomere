<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        *{
            margin: 0;
            padding:0;
            box-sizing: border-box;

        }
        html,
        body {
            background-color: #eaeded;
            font-family: 'Nunito', sans-serif;
            margin: 0;
            
        }
        #app{
            background-color: #e4e4e4;
        }
    </style>
</head>

<body>
    <div id="app">

        <!-- <div class="flex-center position-ref">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div> -->
        <Cart> </Cart>
        <Pheader ></Pheader>
        <router-view></router-view>
        <Pfooter></Pfooter>
    </div>

</body>
<script src="{{url('js/app.js')}}"></script>

</html>