<nav class="navbar navbar-expand-lg" style="background-color: #003566;">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="/HOMECRUD">PANDORA STORE</a>

    @if (Auth::check() && Auth::user()->level == 'admin')
    <a class="navbar-brand btn btn-light text-dark " >Hello Admin</a>
    @endif

    @if (Auth::check() && Auth::user()->level == 'kasir')
    <a class="navbar-brand btn btn-light text-dark" >Hello Kasir</a>
    @endif

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li><a class="nav-link active text-light" href="/HOMECRUD">Home</a></li> 
      @if (Auth::check() && Auth::user()->level == 'admin')
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pilih Data Produk...
          </a>
          <ul class="dropdown-menu ">       
            <li><a class="dropdown-item" href="/tampil-produk">Data Produk</a></li>
            <li><a class="dropdown-item" href="/tampil-pegawai">Data Pegawai</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Coming Soon</a></li>
          </ul>
        </li>
        @endif


        @if (Auth::check() && Auth::user()->level == 'kasir')
        <li class="nav-item">
          <a class="nav-link active text-light" href="/transaksimaster">Transaksi</a>
        </li>
        @endif

        @if (Auth::check() && Auth::user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link active text-light" href="/laporan">Laporan</a>
        </li>
        @endif
        
      </ul>
</div>
</div>
     
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                <span class="glyphicon glyphicon-user">
                                <a class="btn btn-outline-warning text-light m-1" href="{{ route('login') }}">{{ __('Login') }}</span></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-warning text-light m-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-outline-warning text-light m-lg-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
          </div>
     </div>
</nav>
