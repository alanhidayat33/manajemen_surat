@extends("layouts.kosong")

@section('content')
<!-- Awal Header -->
<div class="justify-content-center row text-center row mt-3">
    <div class="col-1 px-0">
        <img class="" src="/file/logo/logo.png" style="width:80px">
    </div>
    <div class="col-6 px-0 align-self-start">
        <div class="text-center">
            <h2 class="lh-0 pb-0 mb-0">POLITEKNIK ELEKTRONIKA NEGERI SURABAYA</h2>
            <p class="lh-0 pb-0 mb-0">Alamat : Jl. Raya ITS, Keputih, Kec. Sukolilo, Kota SBY, Jawa Timur 60111</p>
            <p class="lh-0 pb-0 mb-0">Email : humas@pens.ac.id </p>
        </div>
    </div>
</div>
</div>
<hr>
<div>
    
</div>
<div class="container mt-4">
    <table class="table table-bordered ">
        <tr>
            <td colspan="6" align="center">
                <h6 class="fw-bolder lh-0 pb-0">LEMBAR DISPOSISI</h6>
            </td>
        </tr>
        <tr>
            <td rowspan="1">
                <p class="lh-0 pb-0 mb-0">Surat Dari : {{$hasilSm->pengirim}}</p>
                <p class="lh-0 pb-0 mb-0">Nomor Surat : {{$hasilSm->noSmasuk}}</p>
                <br>
                <p class="lh-0 pb-0 mb-0">Tanggal Surat : {{$hasilSm->tglMasuk}}</p>
            </td>
            <td>
                <p class="lh-0 pb-0 mb-0">Diterima Tanggal : <?php echo date("Y-m-d");?></p>
                <p class="lh-0 pb-0 mb-0">Nomor Agenda : {{$hasilSm->id}}</p>
                <br>
                <p class="lh-0 pb-0 mb-0">Sifat Surat : </p>
                <div class="check">
                    @if($hasilDp[0]->sifat == 'Segera')
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="option1">
                        <label class="form-check-label" for="inlineRadio1">Segera</label>
                    </div>
                    @endif
                    @if($hasilDp[0]->sifat == 'Sangat Segera')
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="option2">
                        <label class="form-check-label" for="inlineRadio2">Sangat Segera</label>
                    </div>
                    @endif
                    @if($hasilDp[0]->sifat == 'Sangat Segera')
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="option2">
                        <label class="form-check-label" for="inlineRadio2">Rahasia</label>
                    </div>
                    @endif
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="lh-0 pb-0 mb-0">Perihal :</p>
                <p class="lh-0 pb-0 mb-0">Tidak ada</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="lh-0 pb-0 mb-0">Diteruskan Kepada :</p>
                <ol class="list-group-numbered border-0">
                    @php
                        $sebars = json_decode($hasilDp[0]->sebar)
                    @endphp
                    @foreach($sebars as $sebar)
                    <li class="list-group-item">{{$sebar}}</li>
                    @endforeach
                </ol>
            </td>
            <td>
                <p class="lh-0 pb-0 mb-0">Dengan Hormat Harap :</p>
                <ul style="list-style-type: circle">
                    @foreach($hasilDp as $dp)
                        <li >{{$dp->tanggapan}}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="lh-0 pb-0 mb-0">Catatan :</p>
                <p class="lh-0 pb-0 mb-0">{{$hasilSm->ringkasan}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div align="right">
                    <p> Kepala {{$hasilDp[0]->jenisJabatan['kodeJabatan']}} <br>
                    <img class="" src="/file/logo/sign.png" style="width:80px">
                    <br> 
                    <u><b>{{$namaD->name}}</b></u> </p>
                </div>
            </td>
        </tr>
    </table>
    <div class="text-center">
        <span>
            Copyright &copy; | Surat.in | <?php echo date("d-m-Y h:i:s");?>
        </span>
    </div>
</div>
<!-- Akhir Header -->

@endsection
