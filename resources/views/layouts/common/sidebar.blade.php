<div class="sidebar">
    <div class="text-center py-4">
        <h4>Dashboard</h4>
    </div>

    <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door"></i> Home
    </a>

    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
        <a href="{{ route('leaves.index') }}" class="{{ request()->is('leaves*') ? 'active' : '' }}">
            <i class="bi bi-list-check"></i> Manage Leave Requests
        </a>
    @else
        <a href="{{ route('leaves.index') }}" class="{{ request()->is('leaves*') ? 'active' : '' }}">
            <i class="bi bi-calendar-check"></i> My Leave Requests
        </a>
    @endif

    <a href="{{ route('profile.show') }}" class="{{ request()->is('profile') ? 'active' : '' }}">
        <i class="bi bi-person"></i> Profile
    </a>
</div>
