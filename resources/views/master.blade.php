<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>
<body>

    <div class="container-fluid bg-info">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
            <div class="col-md-3"></div>

            <h1>Amazing E-Grocery</h1>

            <div class="col-md-3">
                @auth
                    <a href="/logout" class="btn btn-warning">{{__('lang.Logout')}}</a>
                @else
                    <a href="/login" class="btn btn-warning">{{__('lang.Login')}}</a>
                    <a href="/register" class="btn btn-warning">{{__('lang.Register')}}</a>
                @endauth
                <a href="/language/en">EN</a>
                <a href="/language/id">ID</a>
            </div>
        </header>
    </div>

    @auth
    @include('navbar')
    @endauth
    @yield('content')

    <footer class="container-fluid bg-info text-dark justify-content-center text-center">
        <p class="m-0 p-2">&#169 Amazing E-Grocery 2023</p>
    </footer>

</body>
</html>
