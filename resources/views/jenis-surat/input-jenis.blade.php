@extends("layouts.dashboard")

@section('content')
<div class="container-fluid">
    <div class="row mt-4 mx-lg-3">
        <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
            @include('component.sidebar')
        </div>
        <div class="col-lg-9 bg-white pt-4 shadow-sm" style="border-radius:15px">
            <div class="page-header mb-4">
                <h3 class="page-title">Tambah Jenis Surat</h3>
            </div>
            <form action="/save-jenis" method="POST" class="forms-sample row" enctype="multipart/form-data">

                {{ csrf_field() }}
                
                <div class="my-3">
                    <label for="exampleInputEmail1" class="form-label">Kode Surat</label>
                    <input type="text" name="kodeSurat" class="form-control" value="{{ old('pengirim') }}">
                    @error('pengirim')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan Surat">
                    @error('pengirim')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mt-4 ">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
