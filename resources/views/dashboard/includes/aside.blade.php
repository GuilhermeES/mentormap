<aside class="aside p-3">
    <div class="aside__top">
        <img src="{{ asset('images/logo_dashboard.png') }}" alt="Logo">
    </div>
    <div class="aside__hr"><hr></div>
    <div class="aside__nav">
        <nav>
            <a href="{{ route('dashboard.index') }}" class="{{ (request()->segment(2) == '') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>
                Tela inicial
            </a>
            <a href="{{ route('dashboard.gerenciar') }}" class="{{ (request()->segment(2) == 'gerenciar') ? 'active' : '' }}">
                <i class="fa-solid fa-desktop"></i>
                Gerenciar site
            </a>
        </nav>
    </div>
    <div class="aside__hr"><hr></div>
    <div class="aside__bot">
        <div class="aside__user">
            Guilherme Souza
        </div>
        <div class="aside__adm">
            Admnistrador
        </div>
        <div class="aside__logout pt-2">
            <i class="fa-solid fa-right-from-bracket"></i>
            Sair
        </div>
    </div>
</aside>