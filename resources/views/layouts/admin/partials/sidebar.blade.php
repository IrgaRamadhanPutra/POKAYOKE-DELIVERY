<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-header bg-blue">
            {{-- <div class="logo">
                <a href="{{ route('portal') }}"><img src="{{ asset('images/tms-white.png') }}" alt="logo"></a>
            </div> --}}
        </div>
        <div class="sidebar-brand">
            <img src="../assets/img/avatar/tch1.jpg" class="rounded" width="150" cosplay="logo"></a>
            <div class="text-fluid">
                {{-- <h3> ADMIN </h3> --}}
            </div>
        </div>
        <br>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="../assets/img/avatar/tch1.jpg" class="rounded" class="img-fluid" width="60"
                cosplay="logo"></a>
            {{-- <div class="text-fluid">
                ADMIN
            </div> --}}
        </div>
        {{-- </div> --}}
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li> --}}
            <br>
            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>

            </li> --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-duotone fa-car"></i><span>ADM</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/getscan">SCAN </a></li>
                    <li><a class="nav-link" href="/getdn">CHECK DN</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-solid fa-car"></i><span>TOYOTA</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/gettoyota">SCAN EXPORT</a></li>
                    <li><a class="nav-link" href="/check_dn">CHECK DN</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/scan_reguler">SCAN REGULER</a></li>
                    {{-- <li><a class="nav-link" href="/dn_reguler">CHECK DN</a></li> --}}
                </ul>
            </li>
            {{-- <li class="nav-item dropdown">
                <a href="/" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>
            <li class="nav-item dropdown">
                <a href="/getdn" class="nav-link "><i class="fas fa-fire"></i><span>CHECk DN</span></a>

            </li> --}}

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="" class="btn btn-secondary btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
