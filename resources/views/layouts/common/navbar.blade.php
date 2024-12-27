<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="padding: 1rem 2rem; background: linear-gradient(135deg, #6e8efb, #a777e3);">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a class="navbar-brand text-white me-3" href="{{ route('home') }}" style="font-size: 1.5rem; font-weight: 600;">Leave Management</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav" style="gap: 1.5rem;">

                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" style="font-size: 1.1rem;">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('leave-types*') ? 'active' : '' }}" href="{{ route('leave-types.index') }}" style="font-size: 1.1rem;">
                            <i class="bi bi-tags"></i> Leave Types
                        </a>
                    </li>

                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->is('leaves*') ? 'active' : '' }}" href="{{ route('leaves.index') }}" style="font-size: 1.1rem;">
                                <i class="bi bi-list-check"></i> Manage Leave Requests
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->role === 'super-admin')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->is('approvals*') ? 'active' : '' }}" href="{{ route('approvals.index') }}" style="font-size: 1.1rem;">
                                <i class="bi bi-clipboard-check"></i> Approvals
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('profile') ? 'active' : '' }}" href="{{ route('profile.show') }}" style="font-size: 1.1rem;">
                            <i class="bi bi-person"></i> Profile
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>