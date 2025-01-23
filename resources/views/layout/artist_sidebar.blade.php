<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('front_asset/images/logo.png') }}" class="w-75" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ">Spotify</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('artist.dashboard') ? 'active' : '' }}">
            <a href="{{ route('artist.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('artist.events.*') ? 'active' : '' }}">
            <a href="{{ route('artist.events.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Events</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('artist.albums.*') ? 'active' : '' }}">
            <a href="{{ route('artist.albums.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Albums</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('artist.tracks.*') ? 'active' : '' }}">
            <a href="{{ route('artist.tracks.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Tracks</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('artist.cases.*') ? 'active' : '' }}">
            <a href="{{ route('artist.cases.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Cases @if (auth()->user()->artist && auth()->user()->artist->casesCount->count() > 0)
                        <span class="badge badge-center rounded-pill bg-primary">
                            {{ auth()->user()->artist->casesCount->count() }}</span>
                    @endif

                </div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('artist.reports.*') ? 'active' : '' }}">
            <a href="{{ route('artist.reports.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Transparency Reports</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('artist.support.*') ? 'active' : '' }}">
            <a href="{{ route('artist.support.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Contact Support @if ($unreadCount > 0)
                        <span class="badge bg-danger">{{ $unreadCount }}</span>
                    @endif
                </div>
            </a>
        </li>
        <li class="menu-item ">
            <a class="menu-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
            </a>

            <!-- Hidden form to handle the POST request -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</aside>
