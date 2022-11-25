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
                            <h3 class="page-title">Jenis Surat</h3>
                                @if (auth()->user()->type == 'Admin')
                                        <a href="input-jenis" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                                            <i class="bi bi-envelope-plus"></i> Tambah Surat</a>
                                @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                    <table id="example1" class="table table-bordered bg-warning">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Kode Surat</th>
                                    <th> Keterangan </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $x->kodeSurat }}</td>
                                        <td>{{ $x->keterangan }}</td>
                                        <!-- <td> <img src="{{ $x->file }}" width="100px" height="auto" alt="file"></td> -->
                                        <td>
                                            @if (auth()->user()->type == 'Admin')
                                                <a type="button" href="/edit-jenis/{{ $x->id }}"
                                                    class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a type="button" href="/hapus-jenis/{{ $x->id }}"
                                                    onclick="return confirm('Apakah anda yakin menghapus data?')"
                                                    class="btn-sm btn-inverse-danger btn-rounded m-lg-1"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
