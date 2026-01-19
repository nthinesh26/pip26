@extends('pages.general.registrartion')

@section('header-inejct')
    <link rel="stylesheet" href="/pip/assets/css/pip-formsuccess.css" />
@endsection

@section('content')
    <main class="pip-main pip-main--wallpaper">
        <div class="pip-wrapper">
            <div class="pip-content-wrap">

                <h2 class="pip-h2">Maklumat Cadangan Diterima</h2>
                <p class="pip-hero-subtitle1">
                    Terima kasih kerana menghantarkan projek cadangan anda. No Rujukan Projek: <br>
                    <strong>{{ $wishList->wishListID() }}</strong><br> <br>
                    <a href="/" class="pip-content-wrap" target="_blank" rel="noopener">HALAMAN PROFIL ANDA</a>
            </div>
        </div>
        </section>
    </main>
@endsection
