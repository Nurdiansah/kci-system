@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Draf</h1>
<p class="mb-4">Data yang di import dari excel akan masuk ke tabel ini </p>

<div class="ml-auto">

    <!-- DataTales Example -->
    <i class="fas fa-shopping-basket fa-lg mb-3"></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter">
        <span id="total"></span>
    </span>


</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Draf Penyaluran LPG Ke SKIDTANK LPG Terminal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                <thead class="bg-warning">
                    <tr>
                        <th>&nbsp; <input type="checkbox" id="selectall" /></th>
                        <th>Kode Plant</th>
                        <th>Nama SP(P)BE</th>
                        <th>Wilayah</th>
                        <th>Weight Out</th>
                        <th>Weight In</th>
                        <th>Netto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalTimbangKosong = 0;
                    $totalTimbangIsi = 0;
                    $totalNetto = 0;
                    ?>
                    @foreach ($timbangans as $key => $timbangan)
                    <tr>
                        <td class="text-center"><input type="checkbox" class="case" name="id_item[]" value="" /> </td>
                        <td>{{$timbangan->kode_plant}}</td>
                        <td>{{$timbangan->nama_spbe}}</td>
                        <td>{{$timbangan->wilayah}}</td>
                        <td>{{number_format($timbangan->weight_out, 0, ",", ".")}}</td>
                        <td>{{number_format($timbangan->weight_in, 0, ",", ".")}}</td>
                        <td>{{number_format($timbangan->netto, 0, ",", ".")}}</td>
                    </tr>
                    <?php
                    $totalTimbangKosong += $timbangan->weight_out;
                    $totalTimbangIsi += $timbangan->weight_in;
                    $totalNetto += $timbangan->netto;

                    ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <td>{{number_format($totalTimbangKosong, 0, ",", ".")}}</td>
                        <td>{{number_format($totalTimbangIsi, 0, ",", ".")}}</td>
                        <td>{{number_format($totalNetto, 0, ",", ".")}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $('.tanggal').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    });

    var total = document.getElementById("total");

    $(function() {

        $("#selectall").change(function() {
            if (this.checked) {
                $(".case").each(function() {
                    this.checked = true;
                });
                var jumlahCheck = $(".case").length;
            } else {
                $(".case").each(function() {
                    this.checked = false;
                });
                var jumlahCheck = 0;
            }

            // menampilkan output ke elemen hasil
            total.innerHTML = jumlahCheck;
            // console.log(jumlahCheck);
        });

        $(".case").click(function() {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                var jumlahCheck = $('input:checkbox:checked').length;

                $(".case").each(function() {
                    if (!this.checked)
                        isAllChecked = 1;
                });

                if (isAllChecked == 0) {
                    $("#selectall").prop("checked", true);

                    jumlahCheck = $(".case").length;
                }


            } else {
                $("#selectall").prop("checked", false);

                jumlahCheck = $('input:checkbox:checked').length;
            }
            total.innerHTML = jumlahCheck;
            console.log(jumlahCheck);

        });


    });
</script>

@endsection