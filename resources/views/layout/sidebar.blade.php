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
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">User</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('artists.*') ? 'active' : '' }}">
            <a href="{{ route('artists.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Manage Artists</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.track-approvals.*') ? 'active' : '' }}">
            <a href="{{ route('admin.track-approvals.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Track Approvals</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ request()->routeIs('contracts.*') ? 'active' : '' }}">
            <a href="{{ route('contracts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Manage Contracts</div>
            </a>
        </li> --}}
        <li class="menu-item {{ request()->routeIs('cases.*') ? 'active' : '' }}">
            <a href="{{ route('cases.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Manage Cases</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.royalties.*') ? 'active' : '' }}">
            <a href="{{ route('admin.royalties.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Royalties</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ request()->routeIs('support.*') ? 'active' : '' }}">
            <a href="{{ route('support.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Support Tickets @if ($unreadCount > 0)
                        <span class="badge bg-danger">{{ $unreadCount }}</span>
                    @endif
                </div>
            </a>
        </li> --}}
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
