<div class="main-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="index.html" class="logo-light">
            <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="logo" class="logo-lg" height="28">
            <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm" height="28">
        </a>

        <!-- Brand Logo Dark -->
        <a href="index.html" class="logo-dark">
            <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg" height="28">
            <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm" height="28">
        </a>
    </div>

    <!--- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="{{ route('agent.home') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> Mon Tableau de bord </span>
                </a>
            <li class="menu-item">
                <a href="{{ route('agent.status') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-user-check"></i></span>
                    <span class="menu-text"> Mon Statut </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('profil.edit') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-user-circle"></i></span>
                    <span class="menu-text"> Mon Profile </span>
                </a>
            </li>
            </li>
        </ul>
    </div>
</div>
