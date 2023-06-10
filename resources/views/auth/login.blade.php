<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MUC Ticket</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<header class="py-3">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/') }}" style="font-family: 'Raleway', sans-serif;">MUC Ticket</a>
        </div>
    @endif
</header>
<main class="my-auto">
    <div class="container-sm mx-auto">
        <div class="d-flex justify-content-center align-items-center text-center">
            <div>
                <div>
                    <h1 class="text-secondary">MUC Ticket</h1>
                    <p class="text-secondary">Login MUC Ticket System</p>
                </div>
                <div>
                    <form method="POST" action="{{ url('/login') }}">
                        @csrf
                        <div>
                            <input class="m-1 form-control" type="username" placeholder="Username"
                                   name="username" id="username" required>
                        </div>
                        <div class="my-2">
                            <input class="m-1 form-control" type="password" placeholder="Password" name="password"
                                   id="password" required>
                        </div>
                        <div class="my-2">
                            @include('layouts.errors')
                        </div>
                        <div>
                            <button type="submit" class="btn btn-lg btn-info" id="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
