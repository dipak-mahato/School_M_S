<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

#main{
position:relative;
}
div#first{
background-image: url('/school.jpg');
opacity:0.8;
width:1300px;
height:650px;
background-size: cover;
}
div#second{
width:1300px;
height:650px;
position:absolute;
top: 0;
left:0;
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
        </style>
    </head>
    <body id="main">
        <div class="flex-center position-ref full-height">

 

            <div class="content">
                <div id="first">
</div>
<div id="second">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color:black;font-size: 22px; z-index: -1">Login</a>
 
                    @endauth
                </div>
            @endif


                <h1 style="color:black; font-size: 33px;">Welcome To School Management System</h1>
 
</div>
            </div>
        </div>
    </body>
</html>
