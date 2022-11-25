@extends("layouts.dashboard")

@section('content')
<div class="container-fluid">
    <div class="row mt-4 mx-lg-3">
        <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
            @include('component.sidebar')
        </div>
        <div class="col-lg-9 bg-white pt-4 shadow-sm" style="border-radius:15px">
            <div class="page-header mb-4">
                <h3 class="page-title">Edit Surat Keluar</h3>
            </div>
            <form action="/update-sk/{{ $data->id}}" method="POST" class="forms-sample row" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="id" placeholder="id surat" value="{{ $data->idSkeluar }}">
                </div>
                <div class="col-md-4">
                    <label for="inputZip" class="form-label">Nomer Surat</label>
                    <input type="text" name="noSkeluar" class="form-control" value="{{ $data->noSkeluar }}">
                    @error('noSkeluar')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Jenis Surat</label>
                    <select class="form-select" id="inputState" name="jenisSurat_id" value="{{ $data->jenisSurat_id }}">
                        <option value="{{ $data->jenisSurat_id }}">{{ $data->jenisSurat['keterangan'] }}</option>
                        @foreach ($jenis as $x)
                        <option value="{{ $x->id }}">{{ $x->keterangan }}</option>
                        @endforeach
                    </select>
                    @error('jenisSurat_id')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputCity" class="form-label">Date</label><br>
                    <input type="date" name="tglKeluar" class="form-control" placeholder="Tanggal Surat" value="{{ $data->tglKeluar }}">
                    @error('tglKeluar')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="exampleInputEmail1" class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" class="form-control" value="{{ $data->tujuan }}">
                    @error('tujuan')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal">Upload File</label>
                    <!-- <input type="file" name="file" value="{{ old('file') }}"> -->
                    <input class="form-control" type="file" name="file" value="{{ old('file') }}">
                    @error('file')
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
