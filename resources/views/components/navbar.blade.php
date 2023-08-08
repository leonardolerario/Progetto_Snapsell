<nav id="navbar" class="navbar navbar-expand-lg fixed-top bg-nav-mobile">
    <div class="container-fluid">
        <img src="/img/logo4.png" class="custom" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item color-custom">
                    <a class="color-custom nav-link px-4" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active color-custom px-4" aria-current="page"
                        href="{{ route('announcement.index') }}">{{ __('ui.navbar1') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-4" href="#" id="categoriesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.navbar2') }}
                    </a>
                    <ul class="dropdown-menu m-0 p-0" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            @if (Config::get('app.locale') == 'it')
                                <li><a class=" dropd-item dropdown-item"
                                        href="{{ route('category.show', compact('category')) }}">{{ $category->name }}</a>
                                </li>
                            @elseif(Config::get('app.locale') == 'en')
                                <li><a class=" dropd-item dropdown-item"
                                        href="{{ route('category.show', compact('category')) }}">{{ $category->name_en }}</a>
                                </li>
                            @else
                                <li><a class=" dropd-item dropdown-item"
                                        href="{{ route('category.show', compact('category')) }}">{{ $category->name_es }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item px-3">
                    <x-_locale lang="it" nation="it" />
                </li>
                <li class="nav-item px-3">
                    <x-_locale lang="en" nation="gb" />
                </li>
                <li class="nav-item px-3">
                    <x-_locale lang="es" nation="es" />
                </li>
            </ul>
            @guest
                <div class="nav-item px-4 py-2">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('ui.navbar3') }}</a>
                </div>
                <div class="nav-item px-4 py-2">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('ui.navbar4') }}</a>
                </div>
            @else
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-4 py-2" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.benvenuto') }} {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu p-0 m-0">
                        <li><a class="dropdown-item dropd-item" href="{{ route('announcement.create') }}">{{ __('ui.create') }}</a>
                        </li>
                        @if (Auth::user()->is_revisor)
                            <li>
                                <a class="dropdown-item dropd-item btn btn-outline-success btn-sm position-relative"
                                    aria-current="page" href="{{ route('revisor.index') }}">
                                    {{ __('ui.zonaRevisore') }}
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-notification">
                                        {{ App\Models\Announcement::toBeRevisionedCount() }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                        <li><a class="dropdown-item dropd-item" role="button"
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Log
                                Out</a></li>
                        <form method="POST" action="{{ route('logout') }}" id="form-logout" class="d-none">@csrf</form>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>
