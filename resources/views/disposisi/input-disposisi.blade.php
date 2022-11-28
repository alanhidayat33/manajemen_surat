@extends("layouts.dashboard")

@section('content')
<div class="container-fluid">
    <div class="row mt-4 mx-lg-3">
        <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
            @include('component.sidebar')
        </div>
        <div class="col-lg-9 bg-white pt-4 shadow-sm" style="border-radius:15px">
                <div class="page-header d-flex justify-content-between px-4">
                    <h3 class="page-title fw-bold ">Disposisi</h3>
                    @if (auth()->user()->type == 'Kaur' || auth()->user()->type == 'Admin')
                    <a href="javascript:history.back()" type="button" class="btn btn-primary">
                        <i class="bi bi-envelope-plus"></i> Kembali</a>
                    @endif
                </div>
            <form action="/save-disposisi" method="POST" class="forms-sample row" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="sm_id" placeholder="id surat" value="{{ $smasuk->id }}">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Tujuan</label>
                    <select class="form-select" id="inputState" name="tujuan" value="{{ old('tujuan') }}">
                        @foreach($jenis as $x)
                            <option value="{{ $x->id}}">{{$x->kodeJabatan}}</option>
                        @endforeach
                    </select>
                    @error('sifat')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputZip" class="form-label">Catatan</label>
                    <input type="text" name="catatan" class="form-control" value="{{ old('catatan') }}">
                    @error('catatan')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Sifat</label>
                    <select class="form-select" id="inputState" name="sifat" value="{{ old('jenisSurat_id') }}">
                        <option value="Rahasia">Rahasia</option>
                        <option value="Segera">Segera</option>
                        <option value="Segera">Sangat Segera</option>
                    </select>
                    @error('sifat')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Tambah Surat</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
