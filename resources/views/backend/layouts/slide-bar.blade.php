<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">POSYANDU</a>
            <a class="navbar-brand hidden" href="#">P</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('halaman-dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('index-user') }}"> <i class="menu-icon fa fa-user"></i>User
                    </a>
                </li> --}}
                <h3 class="menu-title">UI elements</h3>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Data</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-table"></i><a href="{{ route('index-balita') }}">Balita</a>
                        </li>
                        <li>
                            <i class="fa fa-table"></i><a href="{{ route('index-checkUp') }}">Check Up</a>
                        </li>
                        <li>
                            <i class="fa fa-table"></i><a href="{{ route('index-jenisImunisasi') }}">Jenis
                                Imunisasi</a>
                        </li>
                        <li>
                            <i class="fa fa-table"></i><a href="{{ route('index-jenisVitamin') }}">Jenis Vitamin</a>
                        </li>
                    </ul>
                </li>

                <h3 class="menu-title">Data Kader</h3>

                <li class="menu-item-has-children dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Profil</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li>
                            <i class="fa fa-table"></i><a href="{{route('index-kader')}}">Kader</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>
