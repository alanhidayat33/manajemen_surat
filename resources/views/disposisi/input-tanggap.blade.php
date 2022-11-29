@extends("layouts.dashboard")

@section('content')
<div class="container-fluid">
    <div class="row mt-4 mx-lg-3">
        <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
            @include('component.sidebar')
        </div>
        <div class="col-lg-9 bg-white pt-4 shadow-sm" style="border-radius:15px">
                <div class="page-header d-flex justify-content-between px-4">
                    <h3 class="page-title fw-bold ">Tanggap Disposisi</h3>
                    @if (auth()->user()->type == '' || auth()->user()->type == 'Admin')
                    <a href="javascript:history.back()" type="button" class="btn btn-primary">
                        <i class="bi bi-envelope-plus"></i> Kembali</a>
                    @endif
                </div>
            <form action="/save-disposisi" method="POST" class="forms-sample row" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="sm_id" placeholder="id surat" value="">
                </div>
                <div class="col-md-4">
                    <label for="inputZip" class="form-label">tanggapan</label>
                    <input type="text" name="catatan" class="form-control" value="{{ old('catatan') }}">
                    @error('tanggapan')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Diteruskan Kepada</label>
                    <!-- <select class="form-select" id="inputState" name="tujuan" value="{{ old('tujuan') }}"> -->
                    @if(auth()->user()->jenisJabatan_id == '4')
                        @foreach($data as $x)    
                            <input type="checkbox"> {{$x}}
                        @endforeach
                    @endif
                    </select>
                    @error('sifat')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
