@extends("layouts.dashboard")

@section('content')
<div class="container-fluid">
    <div class="row mt-4 mx-lg-3">
        <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
                @include('component.sidebar')
        </div>
        <div class="col-lg-9 mt-4">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="page-header">
                            <h3 class="page-title">Tambah Surat Masuk</h3>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="card-body">
                            <form action="/save-sm" method="POST" class="forms-sample" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputnomorsurat">Nomor Surat</label>
                                    <input type="text" name="noSmasuk" class="" placeholder="Nomor Surat" value="{{ old('noSmasuk') }}">
                                    @error('noSmasuk')
                                        <p class="text-danger pt-1">{{ $message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Surat</label>
                                    <input type="date" name="tglMasuk" class="" placeholder="Tanggal Surat" value="{{ old('tglMasuk') }}">
                                    @error('tglMasuk')
                                        <p class="text-danger pt-1">{{ $message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Pengirim</label>
                                    <input type="text" name="pengirim" class="" placeholder="Nama Pengirim" value="{{ old('pengirim') }}">
                                    @error('pengirim')
                                        <p class="text-danger pt-1">{{ $message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">jenis Surat</label>
                                    <select class="form-control" id="exampleFormControlSelect2" name="jenisSurat_id"
                                        value="{{ old('jenisSurat_id') }}">
                                        <option selected disabled>Select one</option>
                                        @foreach ($data as $x)
                                            <option value="{{ $x->id }}">{{ $x->keterangan }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenisSurat_id')
                                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Upload File</label>
                                    <input type="file" name="file" value="{{ old('file') }}">
                                    <div class="input-group">
                                        <input type="text" disabled placeholder="Upload File">
                                        <span class="input-group-append">
                                            <button type="file-upload-browse button">Upload</button>
                                        </span>
                                    </div>
                                    @error('file')
                                        <p class="text-danger pt-1">{{ $message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn">Tambah Surat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
