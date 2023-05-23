<nav class="navbar navbar-expand-lg bg-light mb-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/home">{{__('lang.Home')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/cart">{{__('lang.Cart')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">{{__('lang.Profile')}}</a>
                </li>
                @auth
                @if (Auth::user()->role->name == 'Admin')
                <li class="nav-item">
                    <a class="nav-link" href="/admin">{{__('lang.Account Maintenance')}}</a>
                </li>
                @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
