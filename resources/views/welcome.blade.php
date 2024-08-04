@extends('layouts.app')

@section('content')
<div class="container-fluid home-screen">
    <div class="w-full px-5 justify-content-center align-items-center d-flex flex-wrap flex-row">
        <div class="d-flex align-items-center justify-content-center text-big col-md-6">
            <div class="d-flex flex-column">
                <p class="title">Desa Maju Jaya</p>
                <p class="sub-title">Desa Maju Jaya, sebuah perjalanan yang dimulai pada tahun 2006, telah menjadi pilar
                    utama dalam perkembangan
                    di Majalengka. Kami berkomitmen untuk menciptakan sebuah komunitas yang maju dan sejahtera. Dengan
                    keberagaman
                    budaya dan sumber daya alam yang melimpah, Desa Maju Jaya adalah tempat di mana masyarakat
                    berkumpul, berinovasi,
                    dan membangun masa depan bersama.
                    <a class="btn btn-primary mt-2 fw-bold" href="{{ url('/login') }}">Lebih Lanjut</a>
                </p>
            </div>

        </div>

        <div disabled class="text-center  col-md-6 justify-content-center d-flex align-items-center">
            <img disabled class="images-head mt-5 py-5" src="{{ asset('asset/desa.png') }}" alt="Example Image">
        </div>
    </div>
</div>
@endsection

<style>
    .title {
        font-family: 'montserrat';
        font-weight: 800;
        color: #1B55A3 !important;
        font-size: 64px;
    }

    .sub-title {
        background-color: #fff;
        padding: 20px;
        border-radius: 16px;
        font-size: 20px;
        color: #000;
        font-weight: 500
    }

    .home-screen {
        position: relative;
        background-image: url('{{ asset(' asset/pills-with-blisters.jpg') }}');
        background-size: cover;
        width: 100vw !important;
        height: 90vh;
        background-position: center;
        background-repeat: no-repeat;
        background-color: #f0f0f0;
    }
</style>