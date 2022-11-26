@extends("layouts.dashboard")

@section('content')
<div class="container-fluid">
    <div class="row mt-4 mx-lg-3">
        <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
            @include('component.sidebar')
        </div>
        <div class="col-lg-9 bg-white pt-4 shadow-sm" style="border-radius:15px">
            <div class="page-header mb-4">
                <h3 class="page-title">Edit User</h3>
            </div>
            <form action="/update-user/{{ $data->id}}" method="POST" class="forms-sample row"
                enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="id" placeholder="id user" value="{{ $data->idSmasuk }}">
                </div>
                <div class="col-md-4">
                    <label for="inputZip" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                    @error('noSkeluar')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Jabatan</label>
                    <select class="form-select" id="inputState" name="jenisJabatan_id" value="{{ $data->jenisJabatan_id }}">
                        <option value="{{ $data->jenisJabatan_id }}">{{ $data->jenisJabatan['kodeJabatan'] }}</option>
                        @foreach ($jenis as $x)
                        <option value="{{ $x->id }}">{{ $x->kodeJabatan }}</option>
                        @endforeach
                    </select>
                    @error('jenisSurat_id')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputCity" class="form-label">Email</label><br>
                    <input type="text" name="email" class="form-control" placeholder="Email Anda"
                        value="{{ $data->email }}">
                    @error('tglKeluar')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" value="{{ $data->password }}">
                    @error('tujuan')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Role</label>
                    <select class="form-select" id="inputState" name="type" value="{{ $data->type }}">
                        <option value="{{$data->type}}">{{$data->type}}</option>
                        <option value="0">Admin</option>
                        <option value="1">Direktur</option>
                        <option value="2">Wadir</option>
                        <option value="3">Ktu</option>
                        <option value="4">Kaur</option>
                        <option value="5">Maha</option>
                    </select>
                    @error('jenisSurat_id')
                    <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
