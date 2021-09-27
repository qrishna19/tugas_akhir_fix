<!-- Sidebar -->
<div style="border: 1px solid #e3e3e3;background-color: #f8fafc; position: fixed;">
    <ul class="nav flex-column pt-3">
        <li class="nav-item text-center pt-2">
            <a href="#">
                <span class="sub_icon glyphicon">
                    <img src="{{asset('asset/dehaze.png')}}" height="24" alt="logo" loading="lazy">
                </span>
            </a>
        </li>
        @guest
            @if (Route::has('login'))

        <li class="nav-item text-center pt-5">
            <a class="btn btn-default btn-sm" href="/"><img src="{{asset('asset/home.svg')}}" class=""><br />Dashboard</a>
        </li>
        <li class="nav-item text-center pt-5">
            <a class="btn btn-default btn-sm" href="/kategori"><img src="{{asset('asset/kategori.svg')}}" class=""><br />Kategori</a>
        </li>
        <div style="min-height:625px"></div>
        @endif
        @else
        <li class="nav-item text-center pt-5">
            <a class="btn btn-default btn-sm" href="/"><img src="{{asset('asset/home.svg')}}" class=""><br />Dashboard</a>
        </li>
        <li class="nav-item text-center pt-5">
            <a class="btn btn-default btn-sm" href="/kategori"><img src="{{asset('asset/kategori.svg')}}" class=""><br />Kategori</a>
        </li>
        <li class="nav-item text-center pt-5">
            <a class="btn btn-default btn-sm" href="/proyekcreate"><img src="{{asset('asset/proyek.svg')}}" class=""><br />Input Proyek</a>
        </li>
        <li class="nav-item text-center pt-5">
            <a class="btn btn-default btn-sm" href="/proyek"><img src="{{asset('asset/inputproyek.svg')}}" class=""><br />List Proyek</a>
        </li>
        @if(Auth::user()->id_role=='1')
        <li class="nav-item text-center pt-5">
            <a class="btn btn-default btn-sm" href="/user"><img src="{{asset('asset/proyek.svg')}}" class=""><br />User</a>
        </li>
        <li class="nav-item text-center pt-5">
            <a class="btn btn-default btn-sm" href="/masterdata"><img src="{{asset('asset/proyek.svg')}}" class=""><br />Master Data</a>
        </li>
        @endif
        <div style="min-height:900px"></div>
        @endguest
    </ul>
</div>