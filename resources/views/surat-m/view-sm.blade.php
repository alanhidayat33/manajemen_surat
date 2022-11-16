@extends("layouts.dashboard")

@section('content')

    <div class="container-fluid">
        <div class="row mt-4 mx-lg-3">
            <div class="col-lg-3 pe-lg-5 px-1" id="navbarNavAltMarkup">
                @include('component.sidebar')
            </div>
        </div>
    </div>
    <div class="col-lg-9 mt-4">
        <div class="row">
            <div class="col">
                <!-- table -->
                <div class="row mt-4">
                    <div class="col-6 ps-0">
                    <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-md-1"> # </th>
                                    <th> Nomor Surat </th>
                                    <th class="col-md-1"> Tanggal Surat </th>
                                    <th> Pengirim </th>
                                    <th> Perihal</th>
                                    <th class="col-md-1"> File </th>
                                    <th class="col-md-1"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                    <tr>
                                        <td>{{ $x->id }}</td>
                                        <td>{{ $x->noSmasuk }}</td>
                                        <td>{{ $x->tglMasuk }}</td>
                                        <td>{{ $x->pengirim }}</td>
                                        <td>{{ $x->jenisSurat['keterangan'] }}</td>
                                        <td>
                                            @empty($x->file)
                                                <span class="badge badge-danger">Tidak ada</span>
                                            @else
                                                <span class="badge badge-success">Ada</span>
                                            @endempty
                                        </td>
                                        <!-- <td> <img src="{{ $x->file }}" width="100px" height="auto" alt="file"></td> -->
                                        <td>

                                            <a type="button" href="{{ $x->file }}" download
                                                class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip"
                                                data-placement="top" title="Download File">
                                                <i class="mdi mdi-format-vertical-align-bottom"></i>
                                            </a>

                                            @if (auth()->user()->level == 'admin')
                                                <a type="button" href="/edit-sm/{{ $x->id }}"
                                                    class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <i class="mdi mdi-border-color"></i>
                                                </a>
                                                <a type="button" href="/hapus-sm/{{ $x->id }}"
                                                    onclick="return confirm('Apakah anda yakin menghapus data?')"
                                                    class="btn-sm btn-inverse-danger btn-rounded m-lg-1"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="mdi mdi-delete"></i>
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
@endsection
