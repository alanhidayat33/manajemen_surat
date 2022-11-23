@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mt-4 mx-lg-3">
        <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
            @include('component.sidebar')
        </div>
        <div class="col-lg-9 mt-4">
            <div class="row">
                <div class="col">
                    <!-- Notification Bar -->
                    <div class="row me-1">
                        <div class="col-6 ps-0">
                            <h6 class="lh-1">Welcome Back,</h6>
                            <h1 class="fw-bolder lh-1 mb-0">{{ Auth::user()->name }}</h1>
                        </div>
                        <div class="col-2 position-relative">
                            <a href="/view-sm">
                            <div class="position-absolute bottom-0 end-0 btn btn-primary shadow-sm py-1 my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cloud-plus-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                                </svg>
                                Buat Surat</div>
                            </a>
                        </div>
                        <div class="col-4 position-relative">
                            <button type="button"
                                class="position-absolute bottom-0 end-0 btn shadow-sm position-relative rounded"
                                style="background-color : white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-bell-fill text-dark" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                </svg>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $data[3]}}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- Notification Bar -->
                    <!-- Main Coloumn -->
                    <div class="row mt-4">
                        <div class="col-8">
                            <!-- Awal Jumbotron -->
                            <div class="row">
                                <div class=" col position-relative p-0">
                                    <div class="card border-0 shadow-sm py-3"
                                        style="border-radius: 15px; background-image: linear-gradient(to right, rgb(42, 208, 244) , rgb(132, 233, 255))">
                                        <div class="card-body col text-white">
                                            <div class="row position-relative">
                                                <div class="col">
                                                    <h4 class="card-title fw-bold mb-4" style="letter-spacing:1.8px">What is
                                                        Surat.in function?</h4>
                                                    <p class="card-text mb-4">Surat.in is an website base application to manage
                                                        message</p>
                                                    <a href="#" class="btn text-dark fw-bold shadow-sm"
                                                        style="background-color:white">Contact Us!</a>
                                                </div>
                                                <div class="col position-relative">
                                                    <img src="{{ URL::to('/assets/img/jumbotron.png') }}" alt=""
                                                        style="width:185px"
                                                        class="position-absolute top-50 start-50 translate-middle">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Jumbotron -->
                            <div class="row" style="margin-top:30px ">
                                <div class="col-lg-4 px-1">
                                    <div class="card border-0 shadow-sm bg-white position-relative" style="border-radius:15px; height:200px">
                                        <div class="content position-absolute top-50 start-50 translate-middle">
                                            <img src="{{ URL::to('/assets/img/4144835.png') }}" alt=""
                                                style="width:100px"
                                                class="mb-1">
                                            <h5 class="text-center fw-semibold lh-0 mb-0 pbn-1">
                                                Surat Masuk
                                            </h5>
                                            <p class="text-muted text-center">
                                                Total : {{ $data[2]}} </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 px-1">
                                    <div class="card border-0 shadow-sm bg-white position-relative" style="border-radius:15px; height:200px">
                                        <div class="content position-absolute top-50 start-50 translate-middle">
                                            <img src="{{ URL::to('/assets/img/4144781.png') }}" alt=""
                                                style="width:100px"
                                                class="mb-1">
                                            <h5 class="text-center fw-semibold lh-0 mb-0 pbn-1">
                                                Surat Keluar
                                            </h5>
                                            <p class="text-muted text-center">
                                                Total : 1</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 px-1">
                                    <div class="card border-0 shadow-sm bg-white position-relative" style="border-radius:15px; height:200px">
                                        <div class="content position-absolute top-50 start-50 translate-middle">
                                            <img src="{{ URL::to('/assets/img/6697297.png') }}" alt=""
                                                style="width:100px"
                                                class="mb-1">
                                            <h5 class="text-center fw-semibold lh-0 mb-0 pbn-1">
                                                Disposisi
                                            </h5>
                                            <p class="text-muted text-center">
                                                Total : 1</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Awal Box -->
                        <div class="col-lg-4 ps-4">
                            <div class="card border-0 shadow-sm bg-white" style="border-radius:15px; height:450px">
                                <div class="card-body col text-white" >
                                    <h5 class="text-dark fw-bolder mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-archive-fill me-2"
                                            viewBox="0 2 17 16">
                                            <path
                                                d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                                        </svg>Daftar Surat</h5>
                                    <div class="row mb-0">
                                        <div class="col">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <div class="border-0 position-relative"
                                                        style="background-color:rgb(255, 244, 184); width: 50px; height:50px; border-radius:10px">
                                                        <img src="{{ URL::to('/assets/img/561249.png') }}" alt=""
                                                            style="width:35px"
                                                            class="position-absolute top-50 start-50 translate-middle">
                                                    </div>
                                                </div>
                                                <div class="col text-dark">
                                                    <h6 class="lh-0 mb-0 fw-bold">Judul Surat</h6>
                                                    <p class="lh-0 mt-0 text-secondary">Jenis Surat</p>
                                                </div>
                                            </div>
                                            <div class="overflow-auto">
                                                @for ($i = 1; $i < 6; $i++)
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <div class="border-0 position-relative"
                                                            style="background-color:rgb(255, 244, 184); width: 50px; height:50px; border-radius:10px">
                                                            <img src="{{ URL::to('/assets/img/561249.png') }}" alt=""
                                                                style="width:35px"
                                                                class="position-absolute top-50 start-50 translate-middle">
                                                        </div>
                                                    </div>
                                                    <div class="col text-dark">
                                                        <h6 class="lh-0 mb-0 fw-bold"></h6>
                                                        <p class="lh-0 mt-0 text-secondary">Jenis Surat</p>
                                                    </div>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Main Column -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
