<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{route("admin.corpo.index")}}" target="_blank">
            <img src="{{asset('img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">企業データ管理</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ $active == '' ? 'active bg-gradient-primary' :'' }} " href="{{route("admin.corpo.index")}}">
                    <i class="material-icons opacity-10">dashboard</i>
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    </div>
                    <span class="nav-link-text ms-1">トップ</span>
                </a>
            </li>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a class="nav-link text-white{{ $active === 'corpo' ? 'active bg-gradient-primary' :'' }}" href="{{route("admin.corpo.index")}}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">receipt_long</i>
                </div>
                <span class="nav-link-text ms-1">企業情報管理</span>
            </a>

            @can("isSuper")
            <a class="nav-link text-white{{ $active === 'manage' ? 'active bg-gradient-primary' :'' }}" href="{{route("admin.manage.index")}}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">article</i>
                </div>
                <span class="nav-link-text ms-1">管理者一覧</span>
            </a>
       @endcan
        </ul>
    </div>
</aside>
