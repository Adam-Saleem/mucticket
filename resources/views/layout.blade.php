<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUC Ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .footer {
            padding: 20px 0;
            background-color: #f8f9fa;
            text-align: center;
            width: 100%;
            flex-shrink: 0;
        }
    </style>
</head>

<body class="bg-light">
<header class="bg-dark py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a class="navbar-brand text-light" href="{{ url('/dashboard') }}">MUC Ticket</a>
        </div>
        <div class="text-center w-100">
            @yield('header')
        </div>
        <div>
            @php($user = \Illuminate\Support\Facades\Auth::user())
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button type="submit" form="logout-form" class="btn btn-dark btn-l btn-block text-light">{{$user->name}}
                | Logout
            </button>
        </div>
    </div>
</header>
<main class="my-auto">
    <div class="container">
        <div class="my-3">
            @yield('contact')
        </div>
    </div>
</main>
<footer class="footer bg-dark">
    <div class="container text-center">
        <span class="text-light">&copy; 2023 MUC Ticket. All rights reserved.</span>
    </div>
</footer>
</body>

</html>
