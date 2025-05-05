<nav class="navbar">
    <div class="navbar-left">
<div class="navbar-logo">
    <img src="{{ asset('images/LOGO 1.png') }}" alt="Logo Sekolah" class="logo-img">
</div>
        <div class="navbar-brand">
            <a href="{{ route('dashboard', ['username' => request()->query('username')]) }}">SMA NEGERI LANE OF DAWN</a>
        </div>
    </div>

    <ul class="navbar-nav">
        <li><a href="{{ route('dashboard', ['username' => request()->query('username')]) }}">Dashboard</a></li>
        <li><a href="{{ route('pengelolaan.index') }}">Pengelolaan</a></li>
        <li><a href="{{ route('profile.index', ['username' => request()->query('username')]) }}">Profile</a></li>
        <li><a href="{{ route('login') }}">Logout</a></li>
    </ul>
</nav>
