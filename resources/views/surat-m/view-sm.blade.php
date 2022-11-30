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
                    <h3 class="page-title fw-bold ">Surat Masuk</h3>
                    @if (auth()->user()->type == 'Ktu')
                    <a href="input-sm" type="button" class="btn btn-primary">
                        <i class="bi bi-envelope-plus"></i> Tambah Surat</a>
                    @endif
                </div>
            </div>
            
            <div class="row mt-2 p-3  bg-white">
                <table class="table table-striped">
                @if(Auth()->user()->type == 'Direktur' || Auth()->user()->type == 'Wadir' )
                    <thead>
                        <tr>
                            <th>No</th>
                            <th> Nomor Surat </th>
                            <th> Tanggal Surat </th>
                            <th> Pengirim </th>
                            <th> Jenis Surat</th>
                            <th> File </th>
                            <th> Status </th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-scroll">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($result as $x)
                                    <tr>
                                        <td>{{ $loop->iteration  }}</td>
                                        <td>{{ $x->noSmasuk }}</td>
                                        <td>{{ $x->tglMasuk }}</td>
                                        <td>{{ $x->pengirim }}</td>
                                        <td>{{ $x->jenisSurat['keterangan'] }}</td>
                                        <td>
                                            @empty($x->file)
                                            <span class="btn btn-sm btn-warning"><i class="bi bi-file-earmark-excel-fill"></i> Tidak
                                                ada </span>
                                            @else
                                            <a type="button" href="{{ $x->file }}" class="btn btn-sm btn-success"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                Download
                                            </a>
                                            @endempty
                                        </td>
                                        <td>
                                            @if($SM[$i]->read == 1)
                                                <span class="btn btn-sm btn-success"><i class="bi bi-file-earmark-excel-fill"></i>
                                                    Sudah ditanggapi </span>
                                            @else
                                                <span class="btn btn-sm btn-danger"><i class="bi bi-file-earmark-excel-fill"></i>
                                                    Belum Ditanggapi </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" href="/input-disp/{{ $x->id }}" class="btn btn-sm btn-primary"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="bi bi-send-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                            @endforeach
                    </tbody>
                @else
                    <thead>
                        <tr>
                            <th>No</th>
                            <th> Nomor Surat </th>
                            <th> Tanggal Surat </th>
                            <th> Pengirim </th>
                            <th> Jenis Surat</th>
                            <th> File </th>
                            <th> Disposisi</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    @foreach ($dataSm as $x)
                                    <tr>
                                        <td>{{ $loop->iteration  }}</td>
                                        <td>{{ $x->noSmasuk }}</td>
                                        <td>{{ $x->tglMasuk }}</td>
                                        <td>{{ $x->pengirim }}</td>
                                        <td>{{ $x->jenisSurat['keterangan'] }}</td>
                                        <td>
                                            @empty($x->file)
                                            <span class="btn btn-sm btn-warning"><i class="bi bi-file-earmark-excel-fill"></i> Tidak
                                                ada </span>
                                            @else
                                            <a type="button" href="{{ $x->file }}" class="btn btn-sm btn-success"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                Download
                                            </a>
                                            @endempty
                                        </td>
                                        <td>
                                            @if($x->done == 1)
                                            <a type="button" href="/download-lembar/{{$x->id}}" class="btn btn-sm btn-success"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="bi bi-check-circle-fill"></i>
                                                Download
                                            @else
                                            <a type="button" href="#" disabled class="btn btn-sm btn-danger"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                Belum Rilis
                                            @endif
                                            </a>
                                        </td>
                                        <td>
                                            @if (auth()->user()->type == 'Ktu')
                                            <a type="button" href="/edit-sm/{{ $x->id }}" class="btn btn-sm btn-primary"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a type="button" href="/hapus-sm/{{ $x->id }}"
                                                onclick="return confirm('Apakah anda yakin menghapus data?')"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                            @elseif (auth()->user()->type == 'Kaur')
                                            <a type="button" href="/view-disposisi/{{ $x->id }}" class="btn btn-sm btn-primary"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="bi bi-send-check"></i>
                                            </a>
                                            @elseif (auth()->user()->type == 'Direktur' || auth()->user()->type == 'Wadir')
                                            <a type="button" href="/aksi-disposisi/{{ $x->id }}" class="btn btn-sm btn-primary"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="bi bi-send-check"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                    @endforeach
                @endif
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
