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
                    <h3 class="page-title fw-bold ">Disposisi</h3>
                    @if (auth()->user()->type == 'Kaur' || auth()->user()->type == 'Admin')
                    <a href="/input-disposisi/{{$smasuk->id}}" type="button" class="btn btn-primary">
                        <i class="bi bi-envelope-plus"></i> Tambah Disposisi</a>
                    @endif
                </div>
            </div>
            
            <div class="row mt-2 p-3  bg-white">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th> Tujuan </th>
                            <th> Catatan </th>
                            <th> Sifat </th>
                            <th> Status</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-scroll">
                        @foreach ($dispo as $x)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $x->jenisJabatan['kodeJabatan'] }}</td>
                            <td>{{ $x->catatan }}</td>
                            <td>{{ $x->sifat }}</td>
                            <td>
                                @if ($x->status == 1)
                                <a type="button" href="/edit-sm/{{ $x->id }}" class="btn btn-sm btn-primary"
                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="bi bi-envelope-check-fill"></i>
                                    
                                </a>
                                @else
                                <a type="button" href="/hapus-sm/{{ $x->id }}"
                                    onclick="return confirm('Apakah anda yakin menghapus data?')"
                                    class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
                                    title="Delete">
                                    <i class="bi bi-envelope-slash-fill"></i>
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
