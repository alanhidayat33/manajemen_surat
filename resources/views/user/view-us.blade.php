@extends("layouts.dashboard")

@section('content')
<div class="container-fluid">
    <div class="row mt-4 mx-lg-3">
        <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
            @include('component.sidebar')
        </div>
        <div class="col-lg-9 bg-white pt-4 shadow-sm" style="border-radius:15px">
            <div class="row">
                <div class="page-header d-flex justify-content-between px-4">
                    <h3 class="page-title fw-bold ">Data User</h3>
                    @if (auth()->user()->type == 'Admin')
                    <a href="input-user" type="button" class="btn btn-primary">
                        <i class="bi bi-envelope-plus"></i> Tambah User</a>
                    @endif
                </div>
            </div>
            <div class="row mt-2 p-3  bg-white">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th> Nama </th>
                            <th> Jabatan </th>
                            <th> Email </th>
                            <th> Password </th>
                            <th> Role </th>
                        </tr>
                    </thead>
                    <tbody class="overflow-scroll">
                        @foreach ($data as $x)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $x->name }}</td>
                            <td>{{ $x->jenisJabatan['kodeJabatan'] }}</td>
                            <td>{{ $x->email }}</td>
                            <td>{{ $x->password }}</td>
                            <td>
                                @if($x->type == 'Admin')
                                    Admin
                                @elseif ($x->type == 'Direktur')
                                    direktur
                                @elseif ($x->type == 'Wadir')
                                    Wadir
                                @elseif ($x->type == 'Ktu')
                                    Ktu
                                @elseif ($x->type == 'Kaur')
                                    Kaur
                                @elseif ($x->type == 'Maha')
                                    Maha
                                @endif
                            </td>
                            <td>
                                @if (auth()->user()->type == 'Admin')
                                <a type="button" href="/edit-user/{{ $x->id }}" class="btn btn-sm btn-primary"
                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a type="button" href="/hapus-user/{{ $x->id }}"
                                    onclick="return confirm('Apakah anda yakin menghapus data?')"
                                    class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
                                    title="Delete">
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

@endsection
