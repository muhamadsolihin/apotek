@extends('layouts.app')

@section('content')
<div class="container-fluid home-screen">
    <div class="w-full px-5 justify-content-center align-items-center d-flex flex-wrap flex-row">
    <div class="d-flex align-items-center justify-content-center text-big col-md-6">
    <div class="d-flex flex-column">
    <p class="title">APOTEK AULIA</p>   
    <p class="sub-title">Tahun 2006 adalah awal perjalanan Apotek Aulia, yang sejak itu telah menjadi bagian tak terpisahkan dalam dunia kesehatan di Majalengka. Kami adalah salah satu Apotek yang sedang tumbuh pesat di wilayah ini, mengkhususkan diri dalam layanan kesehatan dan farmasi, serta menawarkan fasilitas obat-obatan lengkap beserta dokter klinik.
        <a class="btn btn-primary mt-2 fw-bold" href="{{ url('/login') }}">
        Lebih Lanjut</a>
    </p> 

    </div>
    </div>

     <div disabled class="text-center  col-md-6 justify-content-center d-flex align-items-center">
     <img disabled class="images-head mt-5 py-5" src="{{ asset('asset/pngegg.png') }}" alt="Example Image">
    </div>
    </div>
</div>
@endsection

<style>
    .title{
        font-family:'montserrat';
        font-weight:800;
        color:#1B55A3 !important;
        font-size:64px;
    }
    .sub-title{
        background-color:#fff;
        padding:20px;
        border-radius:16px;
        font-size:20px;
        color:#000;
        font-weight:500
    }
.home-screen {
  position: relative;
  background-image: url('{{ asset('asset/pills-with-blisters.jpg') }}');
  background-size: cover;
  width: 100vw !important;
  height: 90vh;
  background-position: center;
  background-repeat: no-repeat;
  background-color: #f0f0f0;
}


</style>

