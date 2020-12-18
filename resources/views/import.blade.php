@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1>Template Master</h1>
        <div class="card" style="width: 24rem;">
            <img src="{{asset ('img/excel.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="{{asset('template/transaksi.xlsx')}}" class="btn btn-primary stretched-link">Download Template</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <h1>Upload a file</h1>
        <div class="upload-container">
            <form action="{{route('timbangan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="border-container">
                    <div class="icons fa-4x">
                        <i class="fas fa-file-excel" data-fa-transform="shrink-2 up-4"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Browse your compute</label>
                    <input type="file" name="excel" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button class="btn bg-warning" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- <iframe src="{{asset('template/transaksi.xlsx')}}" frameborder="0" scrolling="no" width='100%' height='565px'></iframe> -->
<!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://www.learningaboutelectronics.com/Articles/Example.xlsx' width='80%' height='365px' frameborder='0'> </iframe> -->
<!-- <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=https://drive.google.com/file/d/16JNfMzN35McG4QGCDvieyT3CXkVyyk4W/view?usp=sharing" width='80%' height='365px' frameborder='0'> </iframe> -->

<script>
    $("#file-upload").css("opacity", "0");

    $("#file-browser").click(function(e) {
        e.preventDefault();
        $("#file-upload").trigger("click");
    });
</script>
@endsection