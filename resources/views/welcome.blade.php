<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
    <body>
        <div class="flex-center position-ref full-height">
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

            <div class="content">

                @foreach($apps as $app)
                    <?php $sum = 0?>
                    <p>Nombre:{{ $app->name }}</p>
                    <p>Categoria:{{ $app->category->name }}</p>
                    <p>Descripcion:{{ $app->description }}</p>
                    @foreach ($app->prices as $price)
                        @if($price->application_id == $app->id)
                            <p>Precio:${{ $price->price }}</p>
                            @continue;
                        @endif
                    @endforeach

                    @foreach ($app->califications as $calification)
                        @if($calification->application_id == $app->id)
                            <?php $sum += $calification->calification; ?>
                        @endif
                    @endforeach
                    <?php $prom = $sum / count($app->califications); ?>

                    <p>Calificacion:{{ $prom }}</p><hr>
                @endforeach

                @foreach($users as $user)
                        <p>{{ $user->name }}</p>
                    @foreach($user->wishes as $wish)
                        <p>{{ $wish->application->name }}</p>
                    @endforeach
                @endforeach
                <hr>
            </div>
        </div>
    </body>
</html>
