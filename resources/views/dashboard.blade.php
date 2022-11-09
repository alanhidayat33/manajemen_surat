@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-end">
        <!-- Sidebar -->
        @include('component.sidebar')
        <!-- Akhir sidebar -->

        <!-- Navbar atas -->
        <div class="row justify-content-end mt-4 pe-lg-4">
            <div class="col-lg-10 ps-lg-5">
                <div class="row">
                    <div class="col">
                        <h6 class="lh-1">Welcome Back,</h6>
                        <h1 class="fw-bolder lh-3">{{ Auth::user()->name }}</h1>
                    </div>
                    <div class="col d-flex justify-content-end py-4">
                        <button type="button" class="btn btn-primary position-relative px-3 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-envelope-plus-fill me-1" viewBox="0 2 16 16">
                                <path
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z" />
                                <path
                                    d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                            </svg> Buat Surat
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Navbar -->

        <!-- Baris 2 Col 1 -->
        <div class="col-lg-7 ps-lg-5">
            <div class="container">
                <!-- Highlight -->
                <div class="row d-flex justify-content-center mt-2 text-dark">
                    <div class="card col-lg mb-2 shadow-sm border-0 mx-2" style="border-radius:1rem">
                        <div class="text-white mt-3 rounded"
                            style="background-image: linear-gradient(to left, #fce40a, #fc9f0a); height:30px;">
                            <h6 class="card-title text-center mt-1">Surat Masuk</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="font-size:17px; font-weight:500;">Jumlah surat masuk terkini :
                            </p>
                        </div>
                        <div class="justify-content-end d-flex">
                            <a href="tugas_mhs.php"
                                class="btn-sm btn-outline-secondary mb-2 text-decoration-none">Details</a>
                        </div>
                    </div>

                    <div class="card col-lg mb-2 shadow-sm border-0 mx-2" style="border-radius:1rem">
                        <div class="text-white mt-3 rounded"
                            style="background-image: linear-gradient(to left, #09acf7, #0949f7); height:30px;">
                            <h6 class="card-title text-center mt-1">Surat Keluar</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="font-size:17px; font-weight:500;">Jumlah surat keluar terkini :
                            </p>
                        </div>
                        <div class="justify-content-end d-flex">
                            <a href="tugas_mhs.php"
                                class="btn-sm btn-outline-secondary mb-2 text-decoration-none">Details</a>
                        </div>
                    </div>

                    <div class="card col-lg mb-2 shadow-sm border-0 mx-2" style="border-radius:1rem">
                        <div class="text-white mt-3 rounded"
                            style="background-image: linear-gradient(to left, #f409b2, #f40977); height:30px;">
                            <h6 class="card-title text-center mt-1">Disposisi</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="font-size:17px; font-weight:500;">Jumlah disposisi :</p>
                        </div>
                        <div class="justify-content-end d-flex">
                            <a href="mahasiswa_mhs.php"
                                class="btn-sm btn-outline-secondary text-decoration-none mb-2">Details</a>
                        </div>
                    </div>
                </div>
                <!-- Akhir Highlight -->

                <!-- Tabel Tugas -->
                <div class="container-fluid bg-white rounded-top shadow-sm mt-3">
                    <h5 class="pb-2 pt-3 mb-0 text-dark fw-bold">Daftar Tugas</h5>
                </div>
                <div class="container-fluid rounded-bottom bg-white shadow-sm">
                    <div class="d-flex justify-content-center">
                        <table class="table mt-2 table-striped" style="width:100%">
                            <tr class="table-dark">
                                <th>Kode Tugas</th>
                                <th>Nama Tugas</th>
                                <th>Diberikan</th>
                                <th>Tenggat</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Akhir Tabel Tugas -->

                <!-- Tabel Mahasiswa -->
                <div class="container-fluid bg-white rounded-top shadow-sm mt-3">
                    <h5 class="pb-2 pt-3 mb-0 text-dark fw-bold">Daftar Mahasiswa</h5>
                </div>
                <div class="container-fluid rounded-bottom bg-white shadow-sm mb-3">
                    <div class="d-flex justify-content-center">
                        <table class="table table-striped mt-2" style="width:100%">
                            <tr class="table-dark">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Akhir Tabel Mahasiswa -->
            </div>
        </div>
        <!-- Baris 2 Colom 2 -->

        <div class="col-3 py-2 pe-lg-4">
            <div class="card mb-2 shadow-sm border-0" style="border-radius:1rem">
                <div class="text-white mt-3 rounded"
                    style="background-image: linear-gradient(to left, #fce40a, #fc9f0a); height:30px;">
                    <h6 class="card-title text-center mt-1">Surat Masuk</h6>
                </div>
                <div class="card-body">
                    <p class="card-text" style="font-size:17px; font-weight:500;">Jumlah surat masuk terkini :
                    </p>
                </div>
                <div class="justify-content-end d-flex">
                    <a href="tugas_mhs.php" class="btn-sm btn-outline-secondary mb-2 text-decoration-none">Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir main -->
@endsection
