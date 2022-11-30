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
<div class="container mt-4">
    <table class="table table-bordered ">
        <tr>
            <td colspan="6" align="center">
                <h6 class="fw-bolder lh-0 pb-0">LEMBAR DISPOSISI</h6>
            </td>
        </tr>
        <tr>
            <td>
                <p class="lh-0 pb-0 mb-0">Surat Dari : ALAN TRI ARBANI HIDAYAT</p>
                <p class="lh-0 pb-0 mb-0">Jl. Solo Km. 12 No.52</p>
                <p class="lh-0 pb-0 mb-0">Yogyakarta</p>
                <br>
                <p class="lh-0 pb-0 mb-0">Nomor Surat : 045/II/02/2022</p>
                <br>
                <p class="lh-0 pb-0 mb-0">Tanggal Surat : 6 Februari 2022</p>
            </td>
            <td>
                <p class="lh-0 pb-0 mb-0">Diterima Tanggal : 6 Februari 2022</p>
                <p class="lh-0 pb-0 mb-0">Nomor Agenda : 128</p>
                <br>
                <p class="lh-0 pb-0 mb-0">Sifat Surat : </p>
                <div class="check">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="option1">
                        <label class="form-check-label" for="inlineRadio1">Segera</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="option2">
                        <label class="form-check-label" for="inlineRadio2">Sangat Segera</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="option2">
                        <label class="form-check-label" for="inlineRadio2">Rahasia</label>
                    </div>
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
                    <li class="list-group-item">Direktur</li>
                    <li class="list-group-item">Wakil Direktur</li>
                    <li class="list-group-item">Bagian Keuangan</li>
                </ol>
            </td>
            <td>
                <p class="lh-0 pb-0 mb-0">Dengan Hormat Harap :</p>
                <ul style="list-style-type: circle">
                    <li >Proses Lebih lanjut</li>
                    <li >Koordinasi</li>
                    <li >.......</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="lh-0 pb-0 mb-0">Catatan :</p>
                <p class="lh-0 pb-0 mb-0">Tidak ada</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div align="right">
                    <p> Kepala, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br><br><br><br> <u><b>awdaw</b></u> </p>
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
