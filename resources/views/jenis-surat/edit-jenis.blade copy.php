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
                            <h3 class="page-title">Edit Surat Masuk</h3>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="card-body">
                            <form action="/update-jenis/{{ $data->id }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" placeholder="id jenis" value="{{ $data->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="edit jenis">Kode Surat</label>
                                    <input type="text" name="kodeSurat" class="" placeholder="Jenis Surat" value="{{ $data->kodeSurat }}">
                                    @error('kodeSurat')
                                        <p class="text-danger pt-1">{{ $message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Keterangan</label>
                                    <input type="text" name="keterangan" class="" placeholder="Keterangan Surat" value="{{ $data->keterangan }}">
                                    @error('tglMasuk')
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
