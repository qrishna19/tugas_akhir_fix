<div class="navbar navbar-expand-lg m-0" style="background-color: #f8fafc;">
    <a class="navbar-brand">
        <img src="{{ asset('asset/logo.png') }}" height="30" alt="logo" loading="lazy">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto pt-2">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item pl-3">
                    {{-- @foreach ($mahasiswa->where('id_users', Auth::user()->id) as $index => $user) --}}
                    <a href="/profil" class="nav-link">
                        {{ Auth::user()->nama }}
                        <img src="{{asset('asset/mdi_account_circle.png')}}" height="30" alt="logo" loading="lazy"></span>
                        {{-- {{$user -> nama}} --}}
                        {{-- <img style="border-radius: 50%" src="{{ url('storage/images/', $user->foto_profil) }}" height="30" alt="foto_profil" loading="lazy"></span> --}}
                    </a>
                </li>

                <li class="nav-item dropdown pl-3">
                    <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="{{ asset('asset/mdi_arrow_drop_down.png') }}" height="30" alt="logo" loading="lazy">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" style="min-width: 250px;">
                        <li>
                        </li>
                        <li class="pt-3">
                            <a href="/profil" style="color:black">
                                <p class="pl-5">Lihat Profil</p>
                            </a>
                        </li>
                        <li>
                            {{-- @endforeach --}}
                            <a href="/mahasiswa" style="color:black">
                                <p class="pl-5">Pengaturan & Privasi</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" style="color:black" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <p class="pl-5">{{ __('Logout') }}</p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </li>
        </ul>
    </div>
</div>
